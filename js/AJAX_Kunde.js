//AJAX request für Kunde
setInterval(function AJAX_PLS() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            let arr = (response[parseInt(document.querySelector('[data-bestellungID]').dataset.bestellungid)]);
            let status_of_pizzas = document.querySelectorAll('.status');

            for (let i = 0; i < arr.length; i++) {
                let ajax_status = JSON.parse(arr[i]);
                console.dir(ajax_status);
                for (pizza of status_of_pizzas) {
                    console.log(pizza.id);
                    if (pizza.id == ajax_status.PizzaID) {
                        document.getElementById(pizza.id).innerText = ajax_status.Status;
                    }
                }
            }
        }
    }
    xmlhttp.open("GET", "KundenStatus.php", true);
    xmlhttp.send();
}, 2000);