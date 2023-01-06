fetch("./php/getafiAll.php", { method: "GET" })
  .then((res) => res.text())
  .then((data) => {
    let all = data.split(",");
    let link = all[0].split("|");
    let email = all[1].split("|");
    let name = all[2].split("|");
    let phone = all[3].split("|");
    if (link[0] == " " || link[0] == "" || link[0] == null) {
      document.getElementById("inid").innerHTML = "<h1 style='text-align:center'>No Affiliates Yet</h1>";
    //   document.getElementById("hid").innerHTML = "";
    } else {
      for (let i = 0; i < link.length - 1; i++) {
        document.getElementById("inid").innerHTML += `
           <tr>
           <td data-label="Maketer Name">${name[i]}</td>
           <td data-label="Maketer Email">${email[i]}</td>
           <td data-label="Marketer Link">https://backtoschfund.com/signup?a=${link[i].replace(/\s/g,'')}</td>
           <td data-label="Marketer Phone">${phone[i]}</td>
         </tr>
           `;
      }
    }
  });
