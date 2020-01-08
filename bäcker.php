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
class PageTemplate extends Page
{
    // to do: declare reference variables for members 
    // representing substructures/blocks
    
    /**
     * Instantiates members (to be defined above).   
     * Calls the constructor of the parent i.e. page class.
     * So the database connection is established.
     *
     * @return none
     */
    protected function __construct() 
    {
        parent::__construct();
        // to do: instantiate members representing substructures/blocks
    }
    
    /**
     * Cleans up what ever is needed.   
     * Calls the destructor of the parent i.e. page class.
     * So the database connection is closed.
     *
     * @return none
     */
    protected function __destruct() 
    {
        parent::__destruct();
    }

    /**
     * Fetch all data that is necessary for later output.
     * Data is stored in an easily accessible way e.g. as associative array.
     *
     * @return none
     */
    protected function getViewData()
    {
        $query = "SELECT * FROM bestelltepizza ORDER BY fBestellungID DESC";

        return mysqli_query($this->_database, $query);
    }
    
    /**
     * First the necessary data is fetched and then the HTML is 
     * assembled for output. i.e. the header is generated, the content
     * of the page ("view") is inserted and -if avaialable- the content of 
     * all views contained is generated.
     * Finally the footer is added.
     *
     * @return none
     */
    protected function generateView() 
    {
        header('Refresh: 5');
        $result = $this->getViewData();
        $this->generatePageHeader('to do: change headline');
        $value = $value1 = $value2 = " ";
        $counter = 0;
        while($row = mysqli_fetch_array($result)) {

            $fieldname1 = $row["PizzaID"];
            $fieldname2 = $row["fBestellungID"];
            $fieldname3 = $row["fPizzaName"];
            $fieldname4 = $row["Status"];
            
              switch($fieldname4){

                case "Bestellt":
                     $value = "checked";
                    $value1 = $value2 = " ";
                break;

                case "im Ofen":
                   $value1 = "checked";
                    $value = $value2 = " ";
                break;
                
                case "fertig":
                    $value2 = "checked";
                    $value = $value1 = " ";
                break;
                }  
                $temp = $counter;
                $counter++; 
     echo<<<HTML
     <form action="#" method="POST">
        <div> <H3>$fieldname3</H3>
        Bestellungsnummer: $fieldname2 <br> 
        Status: 
HTML;

      echo '<input type="radio" name="status['.$fieldname1.']" onClick="document.forms['.$temp.'].submit();" value="Bestellt" '.$value.'/> bestellt';
      echo '<input type="radio" name="status['.$fieldname1.']" onClick="document.forms['.$temp.'].submit();"  value="im Ofen" '.$value1.'/> im Ofen';
      echo '<input type="radio" name="status['.$fieldname1.']" onClick="document.forms['.$temp.'].submit();"  value="fertig" '.$value2.'/> fertig <br><br>';
        
echo<<<HTML
        </div><br>
        </form>

        HTML;
    }
 
//  var_dump($_POST['status']);
    $this->generatePageFooter();
    }
    
    /**
     * Processes the data that comes via GET or POST i.e. CGI.
     * If this page is supposed to do something with submitted
     * data do it here. 
     * If the page contains blocks, delegate processing of the 
	 * respective subsets of data to them.
     *
     * @return none 
     */
    protected function processReceivedData() 
    {
        if(isset($_POST['status'])){
            foreach ($_POST['status'] as $pizzaID => $newstatus){
                    // echo $pizzaID .' '. $newstatus;
                    $sql = "UPDATE bestelltepizza SET `Status`='$newstatus' WHERE `PizzaID`='$pizzaID'";
                    mysqli_query($this->_database, $sql);
            
                }
        }
            // header('Location: Bäcker.php');    
    }

    /**
     * This main-function has the only purpose to create an instance 
     * of the class and to get all the things going.
     * I.e. the operations of the class are called to produce
     * the output of the HTML-file.
     * The name "main" is no keyword for php. It is just used to
     * indicate that function as the central starting point.
     * To make it simpler this is a static function. That is you can simply
     * call it without first creating an instance of the class.
     *
     * @return none 
     */    
    public static function main() 
    {
        try {
            $page = new PageTemplate();
            $page->processReceivedData();
            $page->generateView();
        }
        catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

// This call is starting the creation of the page. 
// That is input is processed and output is created.
PageTemplate::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >