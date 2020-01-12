//AJAX request für Kunde
setInterval(function AJAX_PLS() {
    "use strict";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText); // responseText default property of the XMLHttpRequest object
            var json_array = (response[parseInt(document.querySelector('[data-bestellungID]').dataset.bestellungid)]);
            var status_of_pizzas = document.querySelectorAll('.status');
            for (let i = 0; i < json_array.length; i++) {
                let ajax_status = JSON.parse(json_array[i]);
                for (let pizza of status_of_pizzas) {
                    if (pizza.id == ajax_status.PizzaID) {
                        document.getElementById(pizza.id).innerText = ajax_status.Status;
                    }
                }
            }
        }
    }
    xmlhttp.open("GET", "KundenStatus.php", true); // get json from KundenStatus 
    xmlhttp.send();                               // send it to kunde as response
}, 2000);