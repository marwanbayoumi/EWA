let del = document.querySelector('#delete');
let addr = document.querySelector('#address');
let order = document.querySelector('#order');


del.addEventListener("click", function () {
    addr.value = "";
});

console.log(addr);

//  order.addEventListener("click", function () {
//     if (addr.value == "") {
//        alert('Bitte geben Sie eine Addresse an.🍕');
//     }
// });


// console.log('.');
