<?php


/*
 * This class is responsible for storing information about a single postcode
 * Ref: http://russellscottwalker.blogspot.com.au/2013/09/public-properties-getters-and-setters.html
 * Printed out .pdf saved to docs file.
 * This class defines 6 fields $id, $postcode, $suburb, $state, $lat, $lng
 * 
 */
class PostCodeSearch {
    private $id;
    private $postcode;
    /*
     * http://www.php5-tutorial.com/classes/constructors-and-destructors/
     * A constructor is a special function which is automatically called when an
     * object is created. The constructor allows you to send parameters along 
     * when creating a new object, which can then be used to initialize 
     * variables on the object.
     */
    function __construct($id, $postcode) {
        $this->id = $id;
        $this->postcode = $postcode;
    }//END function __construct

    /* CREATE GETTERS & SETTERS */
    
    /* GET retrieves values for private vars using the __constructor() */
    public function getID() {
        return $this->id;
    }
    
    /* DO NOT CREATE SETTER FOR $id */
    
    public function getPostCode() {
        return $this->postcode;
    }
    
    /* SET manipulates/returns values for private vars retrieved by GET using the __constructor() */
    public function setPostCode($code) {
        $this->postcode = $code;
        return $this;
    }
    

    
    /* ADD __toString() */
    
    /*
     * Implement a _toString() that will convert the Object to a single CSV string
     * i.e; 800,DARWIN,NT,-12.801028,130.955789
     */
    public function __toString() {
        return sprintf("%d,%d,%s,%s,%f,%f", $this->id, $this->postcode, $this->suburb,
                $this->state, $this->lat, $this->lng);
    }//END public function __toString
    
    /* CREATE public static function fromCSV($line) - TO WORK $line MUST INC $id */
    
    /*
     * Add a STATIC METHOD public static function fromCSV($line) to create an OBJECT
     * of the type PostCode from a string representing a single CSV line.
     * i.e; 800,DARWIN,NT,-12.801028,130.955789
     */
    public static function fromCSV($line) {
        //This will take the string and break it up wherever a , is:
        $e = explode(",", $line);
        //Create NEW OBJECT and POPULATE each var by its index in the array
        return new PostCode($e[0],$e[1],$e[2],$e[3],$e[4],$e[5]);
        
    }//END public static function fromCSV($line)
    
    
}//END Class PostCode



