fetch("./assets/php/getuser.php", { method: "GET" })
  .then((res) => res.json())
  .then((data) => {
    if (data[0] == undefined) {
        location.href = "./login-v2";
    } 
  });
getbyidevent("done","click",()=>{
    sendPackage()
})
getbyidevent("done1","click",()=>{
    sendPackage()
})
getbyidevent("copy","click",()=>{
getbyid("address").select()
getbyid("address").setSelectionRange(0, 99999); 
navigator.clipboard.writeText(getbyid("address").value);
// document.execCommand("copy")
})
getbyidevent("copy1","click",()=>{
getbyid("address1").select()
getbyid("address1").setSelectionRange(0, 99999); 
navigator.clipboard.writeText(getbyid("address1").value);
// document.execCommand("copy")
})

function sendPackage() {
    let metrobommin = location.href.split("?i=")[1];
    let name,amount;
    if (metrobommin == "m1") {
        name = "Miner Basic";
        amount = 1000
    }
    else if(metrobommin == "m2"){
        name = "Miner Advanced";
        amount = 3000
    }
    else if(metrobommin == "m3"){
        name = "Miner Premium";
        amount = 7000
    }
    else if(metrobommin == "t1"){
        name = "Trader Basic";
        amount = 500
    }
    else if(metrobommin == "t2"){
        name = "Trader Advanced";
        amount = 2500
    }
    else if(metrobommin == "t3"){
        name = "Trader Premium";
        amount = 5000
    }
    fetch(`./assets/php/pay.php?i=${name}&a=${amount}`, { method: "GET" })
    .then((res) => res.text())
    .then((data) => {
        console.log(data);
        swal("Done!", "Your Transaction Is Complete", "success");
    });
}