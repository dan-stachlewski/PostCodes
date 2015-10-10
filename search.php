<?php
require('./model/database.php');
require('./model/PostCode.php');
require('./model/PostCodeSearch.php');
require('./model/PostCodeDB.php');

$searchPostCodes = PostCodeSearch::postcodes_for_search();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Search Form by State w Static Methods:</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <!-- ACT NSW NT SA TAS VIC WA -->
        <h2>Search Form by Postcode w Static Methods:</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label>Choose Postcode:</label>
            <select name="postcode_by_state">
                <option>-- Select Postcode --</option>
            <?php foreach ($searchPostCodes as $searchPostCode): ?>
                <option><?= $searchPostCode->getPostcode(); ?></option>
            <?php endforeach; ?>
            </select>
            <input type="submit" name="submit" value="Submit Postcode!">
        </form>
        
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $postcode_by_state = $_POST['postcode_by_state'];
            echo $postcode_by_state;
            echo "<pre>";
            print_r($postcode_by_state);
            echo "</pre>";
            $searchResults = PostCodeDB::get_postcodes_by_postcode($postcode_by_state);

            echo "<table>";
    echo "<tr>";
        echo "<th>" . "Postcode Id:" . "</th>";
        echo "<th>" . "Postcode:" . "</th>";
        echo "<th>" . "Suburb:" . "</th>";
        echo "<th>" . "State:" . "</th>";
        echo "<th>" . "Latitude:" . "</th>";
        echo "<th>" . "Longitude:" . "</th>";
    echo "</tr>";
foreach ($searchResults as $searchResult) {
    echo "<tr>";
        echo "<td>" . $searchResult->getID() . "</td>";
        echo "<td>" . $searchResult->getPostCode() . "</td>";
        echo "<td>" . $searchResult->getSuburb() . "</td>";
        echo "<td>" . $searchResult->getState() . "</td>";
        echo "<td>" . $searchResult->getLat() . "</td>";
        echo "<td>" . $searchResult->getLng() . "</td>";
    echo "</tr>";
}
  echo "</table><!-- END table -->";
            
            
        }
        
        
        ?>
        
        <script src="js/main.js"></script>
    </body>
</html>