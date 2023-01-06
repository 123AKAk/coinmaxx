fetch("./assets/php/getuser.php", { method: "GET" })
  .then((res) => res.json())
  .then((data) => {
    if (data[0] == undefined) {
      location.href = "./login-v2";
    } else {
      //   makePayment(data[0].email, data[0].phone);
    }
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

function rara() {
  let insert = "";
  for (let i = 0; i < 50; i++) {
    let r = randomIntFromInterval(0, 1);
    if (r == 0) {
      insert += `
    <tr role="row">
        <td><p class="no-margin">${i + 1}.</p></td>
        <td><p class="no-margin">${
          crypto[randomIntFromInterval(0, 12)]
        }</p></td>
        <td><p class="no-margin"><span>$</span>${randomIntFromInterval(
          100,
          2000
        )}.00</p></td>
        <td><p class="no-margin"><span>$</span>${randomIntFromInterval(
          100000,
          1900000
        )}.00</p></td>
        <td><p class="no-margin"><span>$</span>${randomIntFromInterval(
          100000,
          1900000
        )}.00</p></td>
        <td><p class="no-margin">${randomIntFromInterval(100000, 1900000)} ${
        crypto[randomIntFromInterval(0, 12)]
      }</p></td>
        <td><p class="no-margin">0.00603166</p></td>
        <td class="no-wrap"><span class="change-down label label-light-danger"><i class="fa fa-chevron-down"></i> -${randomIntFromInterval(
          0,
          100
        )}.${randomIntFromInterval(0, 100)}%</span></td>
    </tr>
`;
    } else {
      insert += `
    <tr role="row">
        <td><p class="no-margin">${i + 1}.</p></td>
        <td><p class="no-margin">${
          crypto[randomIntFromInterval(0, 12)]
        }</p></td>
        <td><p class="no-margin"><span>$</span>${randomIntFromInterval(
          100,
          2000
        )}.00</p></td>
        <td><p class="no-margin"><span>$</span>${randomIntFromInterval(
          100000,
          1900000
        )}.00</p></td>
        <td><p class="no-margin"><span>$</span>${randomIntFromInterval(
          100000,
          1900000
        )}.00</p></td>
        <td><p class="no-margin">${randomIntFromInterval(100000, 1900000)} ${
        crypto[randomIntFromInterval(0, 12)]
      }</p></td>
        <td><p class="no-margin">0.00603166</p></td>
        <td class="no-wrap"><span class="change-up label label-light-success"><i class="fa fa-chevron-up"></i> ${randomIntFromInterval(
          0,
          100
        )}.${randomIntFromInterval(0, 100)}%</span></td>
    </tr>
`;
    }
  }
  getbyid("data").innerHTML = insert;
}

rara()

setInterval(() => {
  rara();
}, 3000);
