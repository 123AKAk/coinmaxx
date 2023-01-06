let uname = document.getElementById("name");
let phone = document.getElementById("phone");
let email = document.getElementById("email");

let btn = document.getElementById("submit");
///VALIDATING THE FILEDS
var number = /^[^0-9]+$/;
var letter = /^[^a-zA-Z]+$/;
var emailtest = /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/;

btn.addEventListener("click", (e) => {
  e.preventDefault();
  if (
    uname.value == 0 ||
    phone.value == 0 ||
    email.value == 0 
  ) {
    shout("Fill the fileds",0);
  } else if (number.test(phone.value) == true) {
    shout("Only Numbers Are Allowed",0);
  } else if (phone.value.length < 9) {
    shout("Phone Number Must Be At Least 9 Character Long",0);
  } else if (emailtest.test(email.value) == false) {
    shout("Enter a valid Email",0);
  }
  else{

  let loca = "php/add.php";
  let formdata = new FormData();
  let random = Math.floor((Math.random() * 100) + 1)
  let link = `bck-${uname.value}${random}`
  formdata.append("uname", uname.value);
  formdata.append("email", email.value);
  formdata.append("phone", phone.value);
  formdata.append("link", link.replace(/\s/g,''));
  fetch(loca, { method: "POST", body: formdata })
    .then((res) => res.text())
    .then((data) => {
     console.log(data);
     if (data == 1) {
      shout("Succesfully added",1);
    } else if (data == 0) {
      shout("Check Your Connection And Try Again",0);
    } else if (data == 2) {
      shout("Username Alredy Exist",0);
    } else if (data == 3) {
      shout("User With This Phone Number Alredy Exist",0);
    } else if (data == 4) {
      shout("User With This Email Alredy Exist",0);
    }
    });
  }

});
