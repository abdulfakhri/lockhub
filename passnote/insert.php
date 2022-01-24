<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();


$account_name=$_POST['account_name'];
$url=$_POST['url'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$username=$_POST['username'];
$key_questions=$_POST['key_questions'];
$reg_date=$_POST['reg_date'];
$user = $_SESSION['id'];
/*
account_name,
url,
name,
email
password
phone
username
key_questions
reg_date
*/
//account_name,url,name,email,password,phone,username,key_questions,reg_date
try{
    mysqli_query($conn,"INSERT INTO `pass_notes`(account_name,url,name,email,password,phone,username,key_questions,reg_date,user_key) 
    VALUES ('$account_name','$url','$name','$email','$password','$phone','$username','$key_questions','$reg_date','$user')");
    echo "Brand Saved Successfullay";
}
catch (Exception $e)
{
    echo $e->getMessage();
}
