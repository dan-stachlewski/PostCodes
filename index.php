<?php
require('./model/database.php');
require('./model/PostCode.php');
require('./model/PostCodeDB.php');

$id = 1;
$postcode = PostCodeDB::getPostCode($id);

/*
 * Add all data from csv file, see files directory 
 * Test all db functions 
 * get maps to dispaly a suburb from a database
 */



?>

<?php include './view/header.php'; ?>
<div id="main">
    <?php
    echo $postcode->getID() . "<br>";
    echo $postcode->getPostCode() . "<br>";
    echo $postcode->getSuburb() . "<br>";
    echo $postcode->getState() . "<br>";
    echo $postcode->getLat() . "<br>";
    echo $postcode->getLng() . "<br>";
    
    ?>
</div>
<?php include './view/footer.php'; ?>

