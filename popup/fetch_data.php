
<style>
.checked {
  color: orange;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
$servername = "localhost";
$username = "u587940520_sticky";
$password = "!@#123qweasdZXC";
$dbname = "u587940520_sticky_review";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
function findDateDiff($start_date,$end_date) {
   

// Declare and define two dates
$date1 = strtotime($start_date);
$date2 = strtotime($end_date);

// Formulate the Difference between two dates
$diff = abs($date2 - $date1);


// To get the year divide the resultant date into
// total seconds in a year (365*60*60*24)
$years = floor($diff / (365*60*60*24));


// To get the month, subtract it with years and
// divide the resultant date into
// total seconds in a month (30*60*60*24)
$months = floor(($diff - $years * 365*60*60*24)
							/ (30*60*60*24));


// To get the day, subtract it with years and
// months and divide the resultant date into
// total seconds in a days (60*60*24)
$days = floor(($diff - $years * 365*60*60*24 -
			$months*30*60*60*24)/ (60*60*24));


// To get the hour, subtract it with years,
// months & seconds and divide the resultant
// date into total seconds in a hours (60*60)
$hours = floor(($diff - $years * 365*60*60*24
	- $months*30*60*60*24 - $days*60*60*24)
								/ (60*60));


// To get the minutes, subtract it with years,
// months, seconds and hours and divide the
// resultant date into total seconds i.e. 60
$minutes = floor(($diff - $years * 365*60*60*24
		- $months*30*60*60*24 - $days*60*60*24
						- $hours*60*60)/ 60);


// To get the minutes, subtract it with years,
// months, seconds, hours and minutes
$seconds = floor(($diff - $years * 365*60*60*24
		- $months*30*60*60*24 - $days*60*60*24
				- $hours*60*60 - $minutes*60));

// Print the result
//printf($days);

return $days;


}
$qw=$_GET['q'];

$sql = "SELECT * FROM sticky_review WHERE st_user='$qw' ORDER BY st_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: ".$row["st_id"]." - Name: ".$row["st_name"]." ".$row["st_desc"]."<br>";
          $up="/reviews/uploads/".$row["st_image"];
       
          $stars=$row["st_stars"];

          $started_date=$_GET["st_date"];

          $today=date("Y-m-d hh:mm:ss");
          $start_date = strtotime($started_date);
          $today_date = strtotime($today);

         //$res=($today_date - $start_date)/60/60/24;
         $res =findDateDiff($started_date, $today);
          if($res<=30){
 if($stars==1) {
              $star=
              '
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              ';
          }else if ($stars==2) {
             $star=
              '
              <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              ';

          }else if ($stars==3) {
             $star=
              '
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              ';

          }else if ($stars==4) {
              $star=
              '
              <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              ';
          }else if ($stars==5) {
             $star=
              '
              <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              ';
          }
       echo "<table >";
       echo "<tr>";
       echo "<td>"."<img style='width:62px; height:62px;border-radius: 30px 30px;'  src=".$up.">"."</td>";
       echo "<td>".
       $row["st_name"]."<br>".$row["st_desc"]."<br>".$star."<br>"
       ."</td>";
       echo "</tr>";
       echo "</table >";
         
          }
         


   }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

