fetch(`./php/invest1.php`, { method: "GET" })
  .then((res) => res.json())
  .then((data) => {
    console.log(data);
    if (data[0] == " " || data[0] == "" || data[0] == null) {
      document.getElementById("inid").innerHTML =
        "<h1 style='text-align:center'>No Investment</h1>";
      //   document.getElementById("hid").innerHTML = "";
    } else {
      // document.getElementById("name").innerHTML += `${data[i].split(" ")[0]}'s`
      for (let i = 0; i < data.length; i++) {
        document.getElementById("inid").innerHTML += `
           <tr>
           <td data-label="#">${i + 1}</td>
           <td data-label="UserName">${data[i].name}</td>
           <td data-label="Package">${data[i].package}</td>
           <td data-label="Amount">$ ${data[i].amount}.00</td>
           <td data-label="Date Started">${data[i].date}</td>
           <td data-label="Status">${
             data[i].confirm == 0 ? "Pending" : "Paid"
           }</td>
           ${
            data[i].confirm == 0 ? `
             <td data-label="Pay User"><button class="btn-table" onclick="confirm('${
               data[i].id
              }')">Confirm Payment</button></td>` : `
              <td data-label="Pay User"><button class="btn-table" style= "background:gray; cursor:not-allowed">Confirmed</button></td>`
            }
         </tr>
           `;
      }
    }
  });
function confirm(id) {
  fetch(`./php/update.php?id=${id}`, { method: "GET" })
    .then((res) => res.text())
    .then((data) => {
        location.href = ""
    });
}
