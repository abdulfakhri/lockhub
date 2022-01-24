<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /login.php');
}

if(isset($_POST['add'])){
    

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
  
    $sql="INSERT INTO `pass_notes`(account_name,url,name,email,password,phone,username,key_questions,reg_date,user_key) 
      VALUES ('$account_name','$url','$name','$email','$password','$phone','$username','$key_questions','$reg_date','$user')";
      echo "Brand Saved Successfullay";

      if (mysqli_query($conn, $sql)) {
        echo "<center>Lead Is Registered!</center>";
         header('Refresh: 0.1; url=/home/cont.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "Lead Is Not Registered, Try Again Later";
    }
    mysqli_close($conn);
    
    	
}



?>

   

<body>
            
    <?php include 'nav.php';?>
 
                        <form action="" method="POST">
       
                                            <div class="form-group">
                                           
                                                <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" autofocus autocomplete="Name">
                                               
                                            </div>
                                            <div class="form-group">
                                               
                                                <input type="text" class="form-control" id="url" name="url" placeholder="Account URL"  autocomplete="URL">
                                            </div>
                                            <div class="form-group">
                                            
                                                
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Registered Name" autofocus autocomplete="Name">
                                            </div>
                                            <div class="form-group">
                                            
                                                
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Registered Email" autofocus autocomplete="Name">
                                            </div>
                                            <div class="form-group">
                                            
                                           
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Account Password" autofocus autocomplete="Name">
                                        </div>
                                        <div class="form-group">
                                            
                                           
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Registered Phone" autofocus autocomplete="Name">
                                        </div>
                                        <div class="form-group">
                                            
                                           
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Registered Username" autofocus autocomplete="Name">
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <textarea class="form-control" id="key_questions" name="key_questions" cols="10" rows="10" placeholder="Account Security Questions"></textarea>
                                          
                                        </div>
                                            <div class="form-group">
                                                <label for="b_name">Registration Date</label>
                                                <input type="datetime-local" class="form-control" id="reg_date" name="reg_date" placeholder="Registration Date">
                                            </div>
                                            <button type="reset" class="btn btn-secondary editbrand" data-bs-dismiss="modal" id="editBrand" >Cancel</button>
                                        <input type="submit" class="btn btn-primary" name="add" value="Record Password">
                            
            
                                        </form>
                                    </div>
                                    
    <?php include 'footer.php';?>
