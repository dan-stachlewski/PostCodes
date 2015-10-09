<?php
require('./model/database.php');
require('./model/PostCode.php');
require('./model/PostCodeDB.php');

/*
 * Add all data from csv file, see files directory 
 * Test all db functions 
 * get maps to dispaly a suburb from a database
 */
?>

<?php include './view/header.php';?>
<div id="main">
<?php
$id = 1;
$postcode = PostCodeDB::getPostCode($id);
echo "<pre>";
print_r($postcode);
echo "</pre>";
 
echo "<strong>Postcode Id:</strong> " . $postcode->getID() . "<br>";
echo "<strong>Postcode:</strong> " . $postcode->getPostCode() . "<br>";
echo "<strong>Suburb:</strong> " . $postcode->getSuburb() . "<br>";
echo "<strong>State:</strong> " . $postcode->getState() . "<br>";
echo "<strong>Latitude:</strong> " . $postcode->getLat() . "<br>";
echo "<strong>Longitude:</strong> " . $postcode->getLng() . "<br><br>";

/* THIS CODE PRINTS OUT THE ENTIRE POSTCODE DATABASE */
$postcode = PostCodeDB::getAllPostCodes();
echo "<table>";
    echo "<tr>";
        echo "<th>" . "Postcode Id:" . "</th>";
        echo "<th>" . "Postcode:" . "</th>";
        echo "<th>" . "Suburb:" . "</th>";
        echo "<th>" . "State:" . "</th>";
        echo "<th>" . "Latitude:" . "</th>";
        echo "<th>" . "Longitude:" . "</th>";
    echo "</tr>";
foreach ($postcode as $pc) {
    echo "<tr>";
        echo "<td>" . $pc['id'] . "</td>";
        echo "<td>" . $pc['postcode'] . "</td>";
        echo "<td>" . $pc['suburb'] . "</td>";
        echo "<td>" . $pc['state'] . "</td>";
        echo "<td>" . $pc['lat'] . "</td>";
        echo "<td>" . $pc['lng'] . "</td>";
    echo "</tr>";
}
  echo "<table>";
    ?>
</div>
<?php include './view/footer.php'; ?>

