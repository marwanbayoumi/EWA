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
       while($row = mysqli_fetch_array($result)) {

            $field1name = $row["PizzaNummer"];
            $field2name = $row["PizzaName"];
            $field3name = $row["Bilddatei"];
            $field4name = $row["Preis"];
     
            //echo $field1name. " " . $field2name. " " . $field3name. " " . $field4name . '<br><br>';
            echo <<<HTML
            <div >
            <figure> 
HTML;
          echo  '<img class="pizzaImage" src="'.$field3name.'"> <br/>';
            echo <<<HTML
            <figcaption> $field2name</figcaption> <br/>
             $field4name €
            </figure>
              <br/>
              </div >
HTML;
    } //create form html and send it to Bestellung.php
    echo<<<HTML
    <br>
              <form action ="Bestellung.php" method="post"> 
  <input type="text" value="" name="email"  placeholder="Ihre Email-Adresse"> <br/><br/>
  <input type="text" value="" name="vorname"  placeholder="Vorname"> <br/><br/>
  <input type="text" value="" name="nachname"  placeholder="Nachname"> <br/><br/>
  <input type="text" value="" name="plz"  placeholder="PLZ"> <br/><br/>
  <input type="text" value="" name="stadt"  placeholder="Stadt"> <br/><br/>
<input type="button" name="delete choice " value="Eingabe Löschen">
<input type="submit" name="order" value="Bestellen">
</form>
HTML;
           
    $this->generatePageFooter();
    }
    
    protected function processReceivedData() 
    {
        parent::processReceivedData();
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
