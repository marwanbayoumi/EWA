<?php	// UTF-8 marker äöüÄÖÜß€


/**
 * Class PageTemplate for the exercises of the EWA lecture
 * Demonstrates use of PHP including class and OO.
 * Implements Zend coding standards.
 * Generate documentation with Doxygen or phpdoc
 * 
 * PHP Version 5
 *
 * @category File
 * @package  Pizzaservice
 * @author   Bernhard Kreling, <b.kreling@fbi.h-da.de> 
 * @author   Ralf Hahn, <ralf.hahn@h-da.de> 
 * @license  http://www.h-da.de  none 
 * @Release  1.2 
 * @link     http://www.fbi.h-da.de 
 */
// to do: change name 'PageTemplate' throughout this file
require_once './Page.php';

/**
 * This is a template for top level classes, which represent 
 * a complete web page and which are called directly by the user.
 * Usually there will only be a single instance of such a class. 
 * The name of the template is supposed
 * to be replaced by the name of the specific HTML page e.g. baker.
 * The order of methods might correspond to the order of thinking 
 * during implementation.
 
 * @author   Bernhard Kreling, <b.kreling@fbi.h-da.de> 
 * @author   Ralf Hahn, <ralf.hahn@h-da.de> 
 */
class Bestellung extends Page
{    
  
    protected function __construct() 
    {
        parent::__construct();
    }

    protected function __destruct() 
    {
        parent::__destruct();
    }

    protected function getViewData()
    {
        $query = "SELECT * FROM angebot";

        return mysqli_query($this->_database, $query); 
    }

    protected function generateView() 
    {
        $result = $this->getViewData();
        $this->generatePageHeader('');
        echo '<section class="flex"> <link rel="stylesheet" href="css/bestellung.css">';
       while($row = mysqli_fetch_array($result)) {
           
            $field1name = $row["PizzaNummer"];
            $field2name = $row["PizzaName"];
            $field3name = $row["Bilddatei"];
            $field4name = $row["Preis"];
            $field5name = $row["Beschreibung"];
            echo <<<HTML
            <div class="outer-flex">
            <figure class="flexbox-image"> 
HTML;
        echo '<h3> '.$field2name.' '.$field4name.' €</h3>';
          echo  '<img class="pizzaImage" id="'.$field1name.'" alt='.$field2name.' src="'.$field3name.' "> <br/>';
          echo <<<HTML
        </figure>
        <div class="beschreibung">     
                <span>$field5name</span>
            </div>
        </div>
            <br/>
HTML;
    } //create form html and send it to Bestellung.php
    echo <<<HTML
    </section>
    <br>
    <div>
    <form action="#" method="POST"> 
    
      Bitte geben Sie Ihre Addresse ein: <input type="text"  name="addresse" id="address"  placeholder="Addresse" required><br/><br/>
HTML;

$pizza_array = mysqli_fetch_all($this->getViewData());
for($i=0; $i < mysqli_num_rows($result); $i++){
    for($i=0; $i < count($pizza_array); $i++){
        $id =$pizza_array[$i][0];
        $name=$pizza_array[$i][1];    
        echo  $name .': <input type="number" min="0" max="5" name="pizza['.$name.']" id="pizza-'.$id.'" required value=0><br/><br/>';      
        //<select name="myPizzas" multiple>
            //echo  $name .': <option  name="pizza['.$name.']" id="pizza-'.$id.'" required>   </option><br/><br/>';    
        }
    }
    
    echo <<<HTML
    <span>Summe: <span id="sum" >0</span> €</span> <br> <br>
      <input type="button" id="delete" value="Eingabe Löschen">
         <input type="submit" id="order" name="order" value="Bestellen">
    </form>
    </div>

HTML;
echo '<script src="js/randoms.js"></script>';
     $this->generatePageFooter();
    }

    protected function processReceivedData() 
    {
        if( isset($_POST['addresse']) and $_POST['addresse'] !== ''){ 
            $addresse = $_POST['addresse'];
            $timestamp = date("Y-m-d H:i:s");
            mysqli_real_escape_string($this->_database,$addresse);
            $sql = "INSERT INTO bestellung (`BestellungID`,`Addresse`, `Bestellzeitpunkt`) VALUES ('','$addresse','$timestamp')";
            mysqli_query($this->_database, $sql);
            $lastID = $this->_database->insert_id; //get last inserted key 
            setcookie('lastID',  $lastID, time() + 3600 , "/"); 
            //if $_POST isset then do following if not then see if pizzas have been clicked 
            foreach ($_POST['pizza'] as $name => $anzahl){
                // echo $name . $anzahl;
                for($i = 0; $i < $anzahl; $i++){
                    $sql_2 = "INSERT INTO bestelltepizza (`PizzaID`, `fBestellungID`, `fPizzaName`, `Status` ) VALUES ('','$lastID','$name','Bestellt')";
                    mysqli_query($this->_database, $sql_2);
                }
            }
            header('Location:Kunde.php');
        }
    }

    public static function main() 
    {
        try {
            $page = new Bestellung();
            $page->processReceivedData();
            $page->generateView();
        }
        catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Bestellung::main();