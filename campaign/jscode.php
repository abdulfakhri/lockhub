<?php
session_start();
if(empty($_SESSION["username"]))
{
    header('location:../login.php');
}
	require_once '../includes/db.php';

	require_once '../Controllers/CampaignController.php';

	$db = new DBController();

	$conn = $db->connect();

	$dCtrl  =	new CampaignController($conn);

$camps = $dCtrl->index();

foreach($camps as $camp) : 

                                
// Program to display URL of current page.

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	$link = "https";
else
$link = "http";
// Here append the common URL characters.
$link .= "://";
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
$style=$camp['selected_style'];
$startDate=$camp['date_reg'];
$user=$camp['user_key'];
$base_url=$link;
if($style=="Rounded"){
$border="30px";
}elseif($style=="Squared"){
$border="5px";
}
$js_code= '<iframe width="300" height="90" 
style="position:absolute;bottom:5;left:5;border:1px solid black;border-radius:'.$border.';" 
src='.$link.'/popup/fetch_data.php?q='.$user.'&st_date='.$startDate.'" title="Javascript Code" frameborder="1" allow="accelerometer; 
autoplay; clipboard-write;encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>';
$myVar = htmlentities($js_code, ENT_QUOTES);
echo($myVar);


endforeach;
 
 ?>

