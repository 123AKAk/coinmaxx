function getbyidevent(id, method, func) {
  document.getElementById(id).addEventListener(method, func);
}
function getbyid(id) {
    return document.getElementById(id)
}
function fetchs(url, methods, func) {
  fetch(url, methods)
    .then((res) => res.text())
    .then((data) => {
      func(data);
    });
}
function fetchjson(url, methods, func) {
  fetch(url, methods)
    .then((res) => res.json())
    .then((data) => {
      func(data);
    });
}
 