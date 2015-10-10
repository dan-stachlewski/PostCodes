<?php
/**
 * 
 */
class PostCodeDB {


    /**
     * This function retrieves all the postcode records from the database
     * @return type Array
     */
    public static function getAllPostCodes() {
        $db = Database::getDB();
        $query = "SELECT *   
                  FROM postcodes";
        try {
            $stmnt = $db->query($query);
            $result = $stmnt->fetchAll();
            $stmnt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }//END public static function getAllPostCodes
   
    /**
     * This function retrieves all the data for $id and returns the PostCode
     * associated with the $id
     * @param type $id
     */    
    public static function getPostCode($id) {
        //Connect to dBase using Scope Resolution Operator
        $db = Database::getDB();
        //Query the dBase for the PostCode $id
        $query = "SELECT *
                  FROM postcodes
                  WHERE id = :id";
        //Use try catch stmnt to execute the query
        try {
            //Prepare the query
            $stmnt = $db->prepare($query);
            //Bind the :id to the $id var
            $stmnt->bindValue(':id', $id);
            //Execute the query
            $stmnt->execute();
            //Retrieve the result (inc all corresponding data for $id)
            $result = $stmnt->fetch();
            $stmnt->closeCursor();
            $postcode = new PostCode($result['id'], 
                                     $result['postcode'], 
                                     $result['suburb'], 
                                     $result['state'], 
                                     $result['lat'], 
                                     $result['lng']);
            return $postcode;
        //Used to retrieve any errors    
        } catch (PDOException $e) {
            //Assigns the error to the $error_message var
            $error_message = $e->getMessage();
            //Displays error in the Browser
            display_db_error($error_message);
        }
    }//END public static function getPostCode

    /**
     * This function adds a new $postcode record to the dBase.
     * @param type $postcode
     */
    public static function add($p) {
        $db = Database::getDB();
        $query = "INSERT INTO `postcodes`
                  (`postcode`, `suburb`, `state`, `lat`, `lng`)
                  VALUES
                  (:postcode, :suburb, :state, :lat, :lng)";
        try {
            $stmnt = $db->prepare($query);
            $stmnt->bindValue(':postcode', $p->getPostCode(), PDO::PARAM_INT);
            $stmnt->bindValue(':suburb', $p->getSuburb(), PDO::PARAM_STR);
            $stmnt->bindValue('state', $p->getState(), PDO::PARAM_STR);
            $stmnt->bindValue(':lat', $p->getLat(), PDO::PARAM_STR);
            $stmnt->bindValue(':lng', $p->getLng(), PDO::PARAM_STR);
            $stmnt->execute();
            /*
            echo "<pre>";
            var_dump($p);
            echo "</pre>";
            echo "<h2>Record ADDED Successfully!</h2>";
             */
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo $error_message;
            exit();
        }
    }//END public static function add

    /**
     * This funtion retrieves postcode by matching the $postcode.
     * @param type $postcode
     * @return \PostCode
     */
    public static function get_postcodes_by_postcode($postcode) {
        $db = Database::getDB();
        $query = "SELECT *
                  FROM postcodes
                  WHERE postcode = :postcode";
        try {
            $stmnt->$db->prepare($query);
            $stmnt->bindValue(':postcode', $postcode, PDO::PARAM_INT);
            $stmnt->execute();
            $result = $stmnt->fetchAll();
            $stmnt->colseCursor();
            $results = array();
            foreach($result as $resolt){
                $results[] = new PostCode($resolt['id'],
                                          $resolt['postcode'],
                                          $resolt['suburb'],
                                          $resolt['lat'],
                                          $resolt['lng']);
            }
            return $results;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        
    }

}//END class PostCode


