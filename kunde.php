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

class Bestellung{
    public $PizzaID;
    public $Status;
    public $PizzaName;

    public function __construct($PizzaID, $Status, $PizzaName){
        // $this->BestellungsID = $BestellungsID;
        $this->PizzaID = $PizzaID;
        $this->Status = $Status;
        $this->PizzaName = $PizzaName;
    }
}


class Kunde extends Page
{ 

    // public static $array_bestellungen;
    
    protected function __construct() 
    {
        parent::__construct();
        // session_start();

    }
    
    protected function __destruct() 
    {
        parent::__destruct();
    }

    protected function getViewData()
    {
        if(isset($_COOKIE['lastID'])){
            $cookie = $_COOKIE['lastID'];
            $query = "SELECT * FROM bestelltepizza WHERE `fBestellungID`='$cookie'";
            return mysqli_query($this->_database, $query); 
        }else{
            return false;
        }
    }
    
    protected function generateView() 
    {
        $array_bestellungen = array();
        $array_inner = array();
        $previouse_BestellungsID = 0;
        $BestellungsID;
        $result = $this->getViewData();
        $this->generatePageHeader('');
        if($result != false){
            while($row=mysqli_fetch_array($result)) {
                
                $fieldname1 = $row["PizzaID"];
                $fieldname2 = $row["fBestellungID"];
                $fieldname3 = $row["fPizzaName"];
                $fieldname4 = $row["Status"];
                
                $BestellungsID = $fieldname2;
                echo<<<HTML
        <div> <H3> $fieldname3</H3>
        <span> Status: <span id="$fieldname1" class="status" data-bestellungID='$fieldname2'>$fieldname4 </span></span></div><br>
HTML;
}
}else{
    echo 'BestellungsID ist nicht verfügbar';
}
                echo<<<HTML
                <script src="js/AJAX_Kunde.js"></script>
        HTML;

    $this->generatePageFooter();
}
    
    protected function processReceivedData() 
    {
        header("Content-Type: application/json; charset=UTF-8");

        // $serializedData = json_encode($array_bestellungen);

        // var_dump($serializedData);
    }

    public static function main() 
    {
        try {
            $page = new Kunde();
            $page->processReceivedData();
            $page->generateView();
        }
        catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Kunde::main();
