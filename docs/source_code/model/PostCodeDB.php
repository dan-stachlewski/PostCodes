<?php

class PostcodeDB {

    public static function getPostCode($id) {
        $db = Database::getDB();
        $query = "SELECT * FROM postcodes WHERE id = :id";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $r = $statement->fetch();
            
            $statement->closeCursor();
            $postcode = new PostCode($r['id'], $r['postcode'], $r['suburb'], $r['state'], $r['lat'], $r['lng']);
            return $postcode;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    /* IMPLEMENT 
     * ADD new postcode ($postcode)
	 * now you can update the database 
	 * IMPLEMENT
	 * public static function get_postcodes_by_postcode($postcode) - note: it returns an array
     * public static function get_postcodes_by_suburb($suburb) - note: it returns an array - use LIKE
     * public static function get_postcodes_by_state($state) - note: it returns an array
     * is_postcode_valid($code)
     * DELETE postcode  ($id)
     * UPDATE postcode ($postcode)
     */
}

?>