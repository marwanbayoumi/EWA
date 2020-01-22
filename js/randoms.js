let del = document.querySelector('#delete');
let inputs = document.querySelectorAll('[id^="pizza-"]');
let order = document.querySelector('#order');
let pizzaImages = document.querySelectorAll('.pizzaImage');
let captions = document.querySelectorAll('h3');
let txtarea = document.querySelector('textarea');
let pizza_list = {};
let anzahl = {};


del.addEventListener("click", function () {
    inputs.forEach(e => e.value = "0");
    document.querySelector('#address').value = "";
    document.querySelector('#sum').innerText = "0";
});


// PizzaID as key for obj
for (let i = 0; i < captions.length; i++) {
    let temp = captions[i].innerText.split(' ');
    let property_id = pizzaImages[i].id;
    let value = temp[2];
    let pizza = {};

    pizza[property_id] = value; //{pizzaID: pizzaPrice}
    pizza_list[property_id] = pizza; // list of pizzas
    console.dir(pizza_list);
}



for (test of pizzaImages) {
    test.addEventListener("click", function () {
        let th = parseFloat(document.querySelector('#sum').innerText);
        let element_id = this.id;
        let input_var = document.getElementById('pizza-' + element_id);
        if (input_var.value !== 0) {
            anzahl[element_id] = parseInt(input_var.value);
            anzahl[element_id] += 1;
            input_var.value = anzahl[element_id];
            console.dir(pizza_list);
            th += parseFloat(pizza_list[element_id][element_id]);
            let the = document.querySelector('#sum');
            the.innerText = th.toFixed(2);
        } else {
            anzahl[element_id] = 1;
            input_var.value = anzahl[element_id];
            th += parseFloat(pizza_list[element_id][element_id]);
            let the = document.querySelector('#sum');
            the.innerText = th.toFixed(2);
        }
    })
}


/* 
var li = document.createElement('li'); li.appendChild(document.createTextNode("kwayes")); txtarea.appendChild(li) */