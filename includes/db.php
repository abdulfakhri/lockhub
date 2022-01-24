<?php
class DBController {

  

    private $hostname  =   "localhost";

    private $username  =   "u559678163_lckhubu";

    private $password  =   "!@#123qweasdZXC";

    private $db        =   "u559678163_lckhub";

    //create connection
    public function connect() {

        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->db)or die("Database connection error." . $conn->connect_error);

        return $conn;
    }

    // close connection
    public function close($conn) {

        $conn->close();

    }
}

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	$link = "https";
else
$link = "http";
// Here append the common URL characters.
$link .= "://";
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
$main_url= $link;
$base_url =$main_url."/Controllers/";
$femail = 'system@popupreview.tk';
?>