document.getElementById("click").addEventListener('click', addToCart);
let cart = [];
function addToCart() {
    let num = document.getElementById('number').value;
    let idgood = document.getElementById('idgood').value;
    let title = document.getElementById('title').value;
    console.log(num);
    console.log(idgood);
    console.log(title);
}