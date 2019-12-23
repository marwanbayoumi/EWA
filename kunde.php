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
class Kunde extends Page
{ 

    protected function __construct() 
    {
        parent::__construct();
        session_start();

    }
    
    protected function __destruct() 
    {
        parent::__destruct();
    }

    protected function getViewData()
    {
        $query = "SELECT * FROM bestelltepizza";

        return mysqli_query($this->_database, $query); 
    }
    
    protected function generateView() 
    {
        $result = $this->getViewData();
        $this->generatePageHeader('');
       while($row = mysqli_fetch_array($result)) {

            $field1name1 = $row["PizzaID"];
            $fieldname2 = $row["fBestellungID"];
            $fieldname3 = $row["fPizzaName"];
            $fieldname4 = $row["Status"];

     echo<<<HTML
        <div> <H3>Pizza: $field1name1</H3>
        Bestellungsnummer: $fieldname2 <br> Status: $fieldname4 </div><br>
HTML;
}
    $this->generatePageFooter();
    
}
    
    protected function processReceivedData() 
    {
        if(isset($_SESSION['lastID'])){
            echo $_SESSION['lastID'];

        }else{
            echo 'not set';
        }
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
