let del = document.querySelector('#delete');
let addr = document.querySelector('#address');
let order = document.querySelector('#order');
let pizzaImages = document.querySelectorAll('.pizzaImage');
let captions = document.querySelectorAll('figcaption');
let array = {};
let anzahl= {};
let previous_element_id = 0;


del.addEventListener("click", function () {
    addr.value = "";
});




// PizzaID as key for obj
for(let i = 0; i < captions.length; i++){
    let temp = captions[i].innerText.split(' ');
    let property = pizzaImages[i].id;
    let value = temp[2];  
    let full_item = {};

    full_item[property] = value;
    array[property] = full_item;
}

for(test of pizzaImages){
    test.addEventListener("click", function(){
        let element_id = this.id;
        let input_var = document.getElementById('pizza-'+element_id);
        if(previous_element_id !== 0 && previous_element_id === element_id){
            anzahl[element_id] += 1;
            input_var.value = anzahl[element_id];
        }else{
            anzahl[element_id] = 1;
            input_var.value = anzahl[element_id];
        }
        previous_element_id = element_id;
    console.dir(anzahl);
    }
    )
}

