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


/* if(addr.required === false && addr === ''){
    alert('Bitte geben Sie eine Addresse an.🍕');
}*/



// PizzaName as key for obj
/*  for(item of captions){
    let temp = item.innerText.split(' ');
    let property = temp[1];
    let value = temp[2];
    let full_item = {};
    
    full_item[property] = value;
    array.push(full_item);
} */

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
        if(previous_element_id !== 0 && previous_element_id === element_id){
            anzahl[element_id] += 1;
        }else{
            anzahl[element_id] = 1;
        }
        previous_element_id = element_id;
    console.dir(anzahl);
    })
}