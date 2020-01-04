let del = document.querySelector('#delete');
let inputs = document.querySelectorAll('[id^="pizza-"]');
let order = document.querySelector('#order');
let pizzaImages = document.querySelectorAll('.pizzaImage');
let captions = document.querySelectorAll('figcaption');
let pizza_list = {};
let anzahl = {};


del.addEventListener("click", function () {
    inputs.forEach(e => e.value = "0");
    document.querySelector('#address').value = "";
});


// PizzaID as key for obj
for (let i = 0; i < captions.length; i++) {
    let temp = captions[i].innerText.split(' ');
    let property_id = pizzaImages[i].id;
    let value = temp[2];
    let pizza = {};

    pizza[property_id] = value; //{pizzaID: pizzaPrice}
    pizza_list[property_id] = pizza; // list of pizzas
}



for (test of pizzaImages) {
    test.addEventListener("click", function () {
        let element_id = this.id;
        let input_var = document.getElementById('pizza-' + element_id);
    
        if (input_var.value !== 0 ) {
            anzahl[element_id] = parseInt(input_var.value);
            anzahl[element_id] += 1;
            input_var.value = anzahl[element_id];
        } else {
            anzahl[element_id] = 1;
            input_var.value = anzahl[element_id];
        }
    })
}

