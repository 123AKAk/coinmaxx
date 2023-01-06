
window.addEventListener("load", () => {
  fetch("./php/checkCookie.php",{method:"GET"})
  .then(res => res.text())
  .then(data => {
   if (data == 1) {
     if (location.href.includes("backtoschfund")) {
       location.href = "https://admin.backtoschfund.com/home"
       return;
     } 
       location.href = "../admin/home"
      } 
      
    })
    document.getElementsByClassName('blindspot')[0].style.display = "none"
 })
function shout(mess, con) {
  let alert = $(".alert");
  if (con == 1) {
    alert.fadeIn();
    alert.text(mess);
    alert.css("background", "#56af8a");
    alert.css("display", "flex");
    setTimeout(() => {
      alert.fadeOut(1000);
    }, 2000);
  } else {
    alert.fadeIn();
    alert.text(mess);
    alert.css("background", "red");
    alert.css("display", "flex");
    setTimeout(() => {
      alert.fadeOut(1000);
    }, 2000);
  }
}

let btn = document.getElementById("submit");
// login code//
btn.addEventListener("click", e => {
  e.preventDefault();
let email = document.getElementById("email");
let pass = document.getElementById("pass");
console.log(email.value)
  let formdata = new FormData();
  formdata.append("uname", email.value);
  formdata.append("pass", pass.value);
  if (email.value == 0 || pass.value == 0) {
    shout("Fill The Fileds", 0);
  } else {
    let loca = "php/login.php";
    fetch(loca, { method: "POST", body: formdata })
      .then(res => res.text())
      .then(data => {
          console.log(data)
        if (isNaN(data) == true) {
          shout(data);
        } else {
          shout("Succesfully logged in",1);
          let email = document.getElementById("email");
          let pass = document.getElementById("pass");
          let uname2 = document.getElementById("userp");
          let pass2 = document.getElementById("passp");
          let sub = document.getElementById("sub");
          let where = document.getElementById("where");

          uname2.value = email.value;
          pass2.value = pass.value;
          where.value = location.href;

          sub.click();
        }
      });
  }
});
//end of login code//
