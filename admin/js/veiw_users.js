fetch("./php/userdata.php", { method: "GET" })
  .then((res) => res.json())
  .then((data) => {
    console.log(data);
  
    if (data[0] == " " || data[0] == "" || data[0] == null) {
      document.getElementById("inid").innerHTML = "<h1 style='text-align:center'>No Users Yet</h1>";
    //   document.getElementById("hid").innerHTML = "";
    } else {
      for (let i = 0; i < data.length; i++) {
        document.getElementById("inid").innerHTML += `
        
        <tr>
           <td data-label="#">${i+1}</td>
           <td data-label="Name">${data[i].name}</td>
           <td data-label="Email">${data[i].email}</td>
           <td data-label="Phone">${data[i].phone}</td>
           <td data-label="Address">${data[i].street}</td>
           <td data-label="city">${data[i].city}</td>
           <td data-label="state">${data[i].state}</td>
           <td data-label="Wallet Amount">$${data[i].amount}.00</td>
           <td data-label="Wallet Address">${data[i].wallet_address}</td>
           <td data-label="ssn">${data[i].ssn}</td>
           <!--<td data-label="Investment Status">
           <select value="${data[i].name}">
           <option value="Active">Active<option>
           <option value="Pending">Pending<option>
           <option value="Cancelled">Cancelled<option>
           </select>
           </td>
           <td data-label="Veiw Investments"><button class="btn-table"><a href="invest?i=${data[i].id}"> View</a></button></td>-->
           <td data-label="Veiw Investments"><button class="btn-table"><a href="invest?i=${data[i].id}"> View</a></button></td>
         </tr>
           `;
      }
    }
  });
