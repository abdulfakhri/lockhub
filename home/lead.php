<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: /spages/login.php');
}
?>

<?PHP
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
  try{
      mysqli_query($conn,"INSERT INTO `pass_notes`(account_name,url,name,email,password,phone,username,key_questions,reg_date,user_key) 
      VALUES ('$account_name','$url','$name','$email','$password','$phone','$username','$key_questions','$reg_date','$user')");
      echo "Brand Saved Successfullay";
  }
  catch (Exception $e)
  {
      echo $e->getMessage();
  }
    

}



?>

   

<body>
       

            
    <?php include 'nav.php';?>
         

       
        
  
           <!-- 
            <form action="" method="POST">

                           <input id="" name="name" placeholder="Name" type="text" required /><br>
                           
                           <input id="" name="phone" placeholder="Phone" type="text"required /><br>
                           
                           <input id="" name="email" placeholder="Email" type="text"required /><br>
                          
                           <input id="" name="location" placeholder="Location" type="text" required  /><br>
                           
                           <input id="" name="business_phone" placeholder="Business Phone" type="text" required /><br>
                           
                           <input id="" name="website" placeholder="Website" type="text"required /><br>
                           
                           <input id="" name="business_name" placeholder="Business Name" type="text"required /><br>
                          
                           <input id="" name="lead_status" placeholder="Lead Status" type="text" required  /><br>
                           
                            <input id="" name="business_industry" placeholder="Business Industry" type="text"required /><br>
                          
                           <input id="" name="lead_score" placeholder="Lead Score" type="text" required  /><br>

                         <button type="submit"  class="btn btn-default" name='add' >Add</button><br>
                         
                         <button type="reset" class="btn btn-default">Clear Form </button>
            </form>-->
            
       
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
                                            <button type="button" class="btn btn-secondary editbrand" data-bs-dismiss="modal" id="editBrand" >Close</button>
                                        <button type="button" class="btn btn-primary" name="saveBrand" id="saveBrand"> Save</button>
                            
            
                                        </form>
                                    </div>
                                    
    <?php include 'footer.php';?>
