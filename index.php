<?php
require('./model/database.php');
require('./model/PostCode.php');
require('./model/PostCodeSearch.php');
require('./model/PostCodeDB.php');
?>

<?php include './view/header.php'; ?>
<!-- Section-1 -->        

<div id="section-1">
    <?php
/*
 * Add all data from csv file, see files directory 
 * Test all db functions 
 * get maps to dispaly a suburb from a database
 */
$lines = file('./docs/files/data/postcodes_small.csv');

foreach($lines as $line) {
    if (substr($line, 0, strlen('postcode')) == 'postcode')
        //Ignore the 1st line w Headers
        continue;
        //Postcode's id set to zero, it will be ignored when data saved to dBase
        PostCodeDB::add(PostCode::fromCSV('0,' . $line));

}
    ?>
</div><!-- END section-1 -->

<!-- Section-2 -->

<div id="section-2">
    <h2>Postcodes Imported from CSV File displayed to prove it worked.</h2>
    <?php
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
  echo "</table><!-- END table -->";
?>
</div><!-- END section-2 -->

<!-- Section-3 --> 

<div id="section-3">
<?php

$id = 1;
$postcode = PostCodeDB::getPostCode($id);

?>
    <h2>Example of how to Retrieve a Single Record from a Static Method <br /> w a Hard Coded: <strong>$id = <?= $id; ?></strong></h2>
    <?php
    echo "<table>";
        echo "<tr>";
            echo "<td><strong>Postcode:</strong></td>";
            echo "<td>" . $postcode->getPostcode() . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td><strong>Suburb:</th></strong>";
            echo "<td>" . $postcode->getSuburb() . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td><strong>State:</td></strong>";
            echo "<td>" . $postcode->getState() . "</td>";
        echo "</tr>";
    echo "</table><!-- END table -->";
?>
</div><!-- END section-3 -->

<!-- Section-4 --> 

<div id="section-4">

<?php

$pcode = 810;
$newPostCodes = PostCodeDB::get_postcodes_by_postcode($pcode);
?>
    
<h2>Example of how to Retrieve a Single Record from a Static Method <br /> 
w a Hard Coded: <strong>$pcode = <?= $pcode; ?></strong> in a Table</h2>
    
<?php
//echo "<pre>";
//var_dump($newPostCodes);
//echo "</pre>";

echo "<table>";
    echo "<tr>";
        echo "<th>" . "Postcode Id:" . "</th>";
        echo "<th>" . "Postcode:" . "</th>";
        echo "<th>" . "Suburb:" . "</th>";
        echo "<th>" . "State:" . "</th>";
        echo "<th>" . "Latitude:" . "</th>";
        echo "<th>" . "Longitude:" . "</th>";
    echo "</tr>";
foreach ($newPostCodes as $postCode) {
    echo "<tr>";
        echo "<td>" . $postCode->getID() . "</td>";
        echo "<td>" . $postCode->getPostCode() . "</td>";
        echo "<td>" . $postCode->getSuburb() . "</td>";
        echo "<td>" . $postCode->getState() . "</td>";
        echo "<td>" . $postCode->getLat() . "</td>";
        echo "<td>" . $postCode->getLng() . "</td>";
    echo "</tr>";
}
  echo "</table><!-- END table -->";
?>
<h2>Example of how to Retrieve a Single Record from a Static Method <br /> 
    w a Hard Coded: <strong>$pcode = <?= $pcode; ?></strong> in an Unordered List.</h2>
<?php

foreach ($newPostCodes as $postCode) {
    echo "<ul>";
    echo "<li><span>ID: </span>" . $postCode->getID() . "</li>";
    echo "<li><span>PostCode: </span>" . $postCode->getPostCode() . "</li>";
    echo "<li><span>Suburb: </span>" . $postCode->getSuburb() . "</li>";
    echo "<li><span>State: </span>" . $postCode->getState() . "</li>";
    echo "<li><span>Latitude: </span>" . $postCode->getLat() . "</li>";
    echo "<li><span>Longitude: </span>" . $postCode->getLng() . "</li>";
    echo "</ul>";
}

?>
</div><!-- END section-4 -->

<?php include './view/footer.php'; ?>

