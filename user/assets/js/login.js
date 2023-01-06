let btn = document.getElementById("account");

btn.addEventListener("click", (e) => {
  e.preventDefault();
  let email = document.getElementById("email");
  let password = document.getElementById("psw");

  ///VALIDATING THE FILEDS
  var number = /^[^0-9]+$/;
  var letter = /^[^a-zA-Z]+$/;
  var emailtest = /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/;

  if (emailtest.test(email.value) == false) {
    alert("Enter a valid Email", 0);
  }  else { 
    const formdata = new FormData();
    formdata.append("email", email.value);
    formdata.append("password", password.value);
    fetchs("./assets/php/login.php", { method: "POST", body: formdata }, (data) => {
      if (data == 1) {
        swal("Done!", "Login Successful", "success");
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
        alert("Email does not exist");
      } else if (data == 3) {
        alert("Password is wrong");
      } else if (data == 4) {
        alert("phoneintication code does not exist");
      } else {
        alert("check Connection and try again");
        console.log(data);
      }
    });
  }
});

function testTextFields(id, twoid) {
  document.getElementById(id).addEventListener("keyup", () => {
    if (
      document.getElementById(id).value == 0 ||
      document.getElementById(twoid).value == 0
    ) {
      document.getElementById("n1").style.display = "inherit";
      document.getElementById("n2").style.display = "none";
    } else {
      document.getElementById("n1").style.display = "none";
      document.getElementById("n2").style.display = "inherit";
    }
  });
}
testTextFields("fullname", "email");
testTextFields("email", "fullname");
