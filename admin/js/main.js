function shout(mess, con) {
  let alert = $(".alert");
  console.log(alert);
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

window.addEventListener("load", () => {
    fetch("./php/checkCookie.php",{method:"GET"})
    .then(res => res.text())
    .then(data => {
     if (data != 1) {
       if (location.href.includes("backtoschfund")) {
         location.href = "https://backtoschfund.com/login"
         return;
       } 
         location.href = "../login"
     } 
     else{
       document.getElementsByClassName('blindspot')[0].style.display = "none"
     }
   })
   
   })