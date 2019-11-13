
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="main.css">
     <title>Order</title>
     <?php
     include 'includes/header.php';
     ?>
   </head>
   <body>
     <?php
echo '<h1> Menü für heute! </h1>';

$margherita = "Margherita";
$margheritaPrice = 5.49;
$hawaii = "Hawaii";
$hawaiiPrice = 6.59;
$salami = "Salami";
$salamiPrice = 7.89;
      ?>
    <table>
      <tr>
      <th> <?php echo "$margherita $margheritaPrice €"; ?></th>
        <th><?php echo "$hawaii $hawaiiPrice €"; ?></th>
        <th><?php echo "$salami $salamiPrice €"; ?></th>
      </tr>
      <tr>
        <td><img src="img/margherita.png"> </img></td>
          <td><img src="img/hawaii2.png"> </img></td>
        <td><img src="img/salami.png"> </img></td>
      </tr>
      </table>

<form class="order" action="index.html" method="post">
<table>
  <caption>Ihr Warenkorb</caption>
    <tr >
      <td colspan="2">  <textarea name="Warenkorb" rows="8" cols="80"></textarea>
      </td>
    </tr>
    <tr>
      <td> <input type="submit" name="pizzaEntfernen" value="Pizza zurücklegen">
      </td>
      <td><input type="submit" name="warenkorbLeeren" value="warenkorb leeren">
      </td>
    </tr>
</table>
</form>



<form class="Daten" action="index.html" method="post">
    <table>
      <caption>Ihre Daten Zum Versenden</caption>

      <tr>
        <td><input type="text" name="nachname" value="nachname"></td>
      </tr>
      <tr>
        <td><input type="text" name="Vorname" value="vorname"></td>
      </tr>

      <tr>
    <td> <input type="text" name="straße" value="straße"></td></td>  <td>
      </tr>
      <tr>
    <td> <input type="text" name="hausnaummer" value="hausnaummer"></td>
      </tr>
      <tr>
        <td><input type="text" name="plz" value="plz"></td>
      </tr>
      <tr>
        <td><input type="text" name="ort" value="ort"></td>
      </tr>
      <tr>
        <td><input type="submit" name="bestättigen" value="Bestättigen">  </td>
        <td> <input type="submit" name="Löschen" value="Eingabe löschen"></td>
      </tr>
    </table>
</form>






   </body>
 </html>
