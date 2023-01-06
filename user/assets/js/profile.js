fetch("./assets/php/getprofile.php", { method: "GET" })
  .then((res) => res.json())
  .then((data) => {
    if (data[0] == undefined) {
      location.href = "./login-v2";
    } else {
      //   makePayment(data[0].email, data[0].phone);
      getbyid("name").innerHTML = `${data[0].name}`;
      getbyid("email").innerHTML = `${data[0].email}`;
      getbyid("phone").innerHTML = `${data[0].phone}`;
      getbyid("inputFirstName").value = `${data[0].name}`; 
      getbyid("inputEmail").value = `${data[0].email}`;
      getbyid("inputPhone").value = `${data[0].phone}`;
      getbyid("inputStreet").value = `${data[0].street}`;
      getbyid("inputCity").value = `${data[0].city}`;
      getbyid("inputState").value = `${data[0].state}`;
      getbyid("inputPostCode").value = `${data[0].postalCode}`;
      getbyid("inputWalletAddress").value = `${data[0].wallet_address}`;
      getbyid("myRef").value = `${data[0].myRef}`;
      // getbyid("inputFirstName").value = `${data[0].name}`
      // getbyid("inputFirstName").value = `${data[0].name}`
      console.log(data[0]);
    }
  });

  // to save the personal informationa
getbyidevent("savePersonal", "click", () => {
  const formdata = new FormData();
  formdata.append("name", getbyid("inputFirstName").value);
  formdata.append("email", getbyid("inputEmail").value);
  formdata.append("phone", getbyid("inputPhone").value);

  fetch("./assets/php/updateprofile.php", { method: "POST", body: formdata })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
    });
}); 

  // to save the personal address
getbyidevent("savePersonalAddress", "click", () => {
  const formdata = new FormData();
  formdata.append("street", getbyid("inputStreet").value);
  formdata.append("city", getbyid("inputCity").value);
  formdata.append("state", getbyid("inputState").value);
  formdata.append("postalCode", getbyid("inputPostCode").value);

  fetch("./assets/php/updateprofile1.php", { method: "POST", body: formdata })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
    });
});

  // to save the personal address
getbyidevent("saveWalletAddress", "click", () => {
  const formdata = new FormData();
  formdata.append("wallet", getbyid("inputWalletAddress").value);
  fetch("./assets/php/updateprofile2.php", { method: "POST", body: formdata })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
    });
});

function randomIntFromInterval(min, max) {
  // min and max included
  return Math.floor(Math.random() * (max - min + 1) + min);
}
let crypto = [
  "BTC",
  "ETH",
  "ADA",
  "XRP",
  "DASH",
  "LTC",
  "DOGE",
  "EOS",
  "TRX",
  "HIVE",
  "ADA",
  "SHIB",
  "NEO",
];
let deal = randomIntFromInterval(100, 19000);
for (let i = 0; i < crypto.length; i++) {
  let r = randomIntFromInterval(0, 1);
  if (r == 0) {
getbyid("last").innerHTML += `
<div class="row">
<div class="sub_section">
  <div class="col-xs-12 col-sm-6">
    <p class="text-bold">
      <i class="fa fa-circle text-red"></i>Deal number ${deal}<br>
    </p>
  </div>
  <div class="col-xs-12 col-sm-6">
    <div class="text-right sell-btn">
       <p class="text-right"><span class="label label-danger">sell</span><br>${randomIntFromInterval(0, 45)}.${randomIntFromInterval(0, 30000)} ${crypto[randomIntFromInterval(0, 12)]}</p>
    </div>
  </div>
</div>
</div>
`
  }
  else{
    getbyid("last").innerHTML += `
<div class="row">
<div class="sub_section">
  <div class="col-xs-12 col-sm-6">
    <p class="text-bold">
      <i class="fa fa-circle text-green"></i>Deal number ${deal}<br>
    </p>
  </div>
  <div class="col-xs-12 col-sm-6">
    <div class="text-right sell-btn">
       <p class="text-right"><span class="label label-success">buy</span><br>${randomIntFromInterval(0, 45)}.${randomIntFromInterval(0, 30000)} ${crypto[randomIntFromInterval(0, 12)]}</p>
    </div>
  </div>
</div>
</div>
`
  }
deal++;
}