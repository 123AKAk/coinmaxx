let user = location.href.split("=")[1];

fetch(`./php/trans.php?i=${user}`, { method: "GET" })
  .then((res) => res.text())
  .then((data) => {
    let all = data.split(",");
    let amount = all[0].split("|");
    let tot = all[1].split("|");
    let name = all[3].split("|");
    let date = all[2].split("|");
    console.log(name);
    if (amount[0] == " " || amount[0] == "" || amount[0] == null) {
      document.getElementById("inid").innerHTML = "<h1 style='text-align:center'>No Transaction</h1>";
    //   document.getElementById("hid").innerHTML = "";
    } else {
        document.getElementById("name").innerHTML += `${name[0].split(" ")[0]}'s`
      for (let i = 0; i < amount.length - 1; i++) {
        document.getElementById("inid").innerHTML += `
           <tr>
           <td data-label="#">${i+1}</td>
           <td data-label="Amount">N ${amount[i]}.00</td>
           <td data-label="Type Of Transaction">${tot[i]}</td>
           <td data-label="Date">${date[i]}</td>
         </tr>
           `;
      }
    }
  });
