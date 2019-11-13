 <?php    $host = "localhost";
     $dbName = "ewa";
     $dbUsername = "root";
     $dbPassword = "";

$_database =new mysqli($host, $dbUsername, $dbPassword, $dbName) or die('unable to create');

$query = "SELECT * FROM angebot";

$result = mysqli_query($_database, $query);

while($row = mysqli_fetch_array($result)) {

        $field1name = $row["PizzaNummer"];
        $field2name = $row["PizzaName"];
        $field3name = $row["Bilddatei"];
        $field4name = $row["Preis"];

 
echo $field1name. " " . $field2name. " " . $field3name. " " . $field4name . '<br><br>';
}


?>



    