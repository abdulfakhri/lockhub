<?php

class BrandingController {

    // constructor
    function __construct($conn) {

        $this->conn = $conn;

    }


    // retrieving Branding data
    public function index() {

        $data       =    array();

        $sql        =    "SELECT * FROM pass_notes where user_key=".$_SESSION['id']."";
       // $sql        =    "SELECT * FROM branding ";

        $result     =    $this->conn->query($sql);

        if($result->num_rows > 0) {

            $data        =   mysqli_fetch_all($result, MYSQLI_ASSOC);

        }

        return $data;
    }
}

?>