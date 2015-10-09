<?php


class PostCode {

    private $id;
    private $postcode;
    private $suburb;
    private $state;
    private $lat;
    private $lng;

    function __construct($id, $postcode, $suburb, $state, $lat, $lng) {
       /*your code goes here */
    }

    public function getId() {
        return $this->id;
    }

   /* no setter for ID */
   /*add setters and getters */
   /* add __toString(); */
   /*fromCSV($line), please note that the line must include an $id. 
   */
   
}


