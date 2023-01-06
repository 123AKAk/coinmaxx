fetch("./assets/php/getprofile.php", { method: "GET" })
  .then((res) => res.json())
  .then((data) => {
    if (typeof data != "object") {
      location.href = "../login.html";
    } else {
        getbyid("email").click();
      getbyid("email").value = `${data[0].email}`;
    }
  });

  