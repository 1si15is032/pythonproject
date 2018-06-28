<?php
    
    session_start();

    $user="root";
    $pass="";
    $db="tww";
    $emailErr=$passwordErr="";
    $err=false;
    $errStr="";
    $globalErr=$link="";
    $flag=false;
    if(array_key_exists("submit",$_POST))
		{ 
        if(!$_POST['email']||!$_POST['password']){
            $err=true;
            $globalErr="*Some fields are still empty";
        }
        else{
            $link=mysqli_connect("localhost",$user,$pass,$db) or die;
            $query="Select * from users";
            $result=mysqli_query($link,$query);
        
            while($row=mysqli_fetch_array($result)){
                if($row["email"]==$_POST["email"] && $row["password"]==$_POST["password"]){
                        $_SESSION['id']=$row['uid'];
                        $flag=true;
                        break;
                }
                   
            }
            if($flag==false){
                $err=true;
                $errStr="Incorrect email or password";
            }else{
			header('Location: fetchurl.php');
			echo"logged in";
        
        }
            
        
    }
}
           
        


?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Twitter</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bac.css" type="text/css" >
<link rel="stylesheet" href="nav.css" type="text/css" >
<link href="https://fonts.googleapis.com/css?family=Comic+Sans+MS" rel="stylesheet">
</head>
    
    <style>
        .right{
            margin-left:165px;
        }
        .blueee{ background-color: #d9e9f9;}
        
       
    </style>
         <div class="blueee">
        <div class="row-top" >
           
          
           <h1 style="color:#42adf4;font-family:Courier New Header;font-weight:bold">&nbsp;&nbsp;<img src="image/logo.png" alt="image not found" height="50px" width="50px"/>&nbsp;&nbsp;Twitter</h1>
            
            <h3 style="color:black;font-family:cursive;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'we keep all your important feeds'</h3>
            <br/>
        <br/>
        </div>
      </div>
      
    
          
        
        
  <div>
  <body style="background-color:white">
      <div style="background-color:#42adf4">
          <div class="container-fluid">

  <div class="row">
    <div class="col-sm-4" style="background-color:#42adf4;"></div>
    <div class="col-sm-4 col-md-5"style="background-color:#e8eee2;">
        
        <br>
        <br>
        <br>
        
        <div class="login-form">
            <form method=post>
        <div class="form-group">   
        &nbsp;&nbsp; <label class="control-label col-sm-3" for="fname">
             <button type="button" href="#" class="btn btn-info btn-md" style="color:black;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;</button></label>
        <div class="col-sm-5">
        <input type="email" class="form-control" id="fname" placeholder="enter valid email" name="email">
           
        </div>
            <br>
        
        </div>
                <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">   
            &nbsp;&nbsp;<label class="control-label col-sm-3" for="fname"><button type="button" href="#" class="btn btn-info btn-md" style="color:black;font-weight:bold">Password</button></label>
            <div class="col-sm-5">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span style="color:red"><?php echo $globalErr;?></span>
                    <span style="color:red"><?php echo $errStr;?></span>
                </div><br>
                </div>
                <br>
                <br>
                  
                <div class="form-group">
                <div class="right">
               <div class="col-sm-6">
                   
                <input type="submit" name="submit" value="Login" class="form-control btn btn-info btn-md" class="col-sm-4" style="color:black;font-weight:bold;"> 
                    </div>
                   
                </div>
                </div>
                <br>
                <br>
            </form>
           
      
      
      
      
      
      
      
      </div>
    <div class="col-sm-4" style="background-color:#42adf4;"></div>
  </div>
</div>
          </div>   
      </div>
      
    
      <footer>
        <div class="blueee">
       <div class="row-top">
           <div class="row-top">
            
               
               <h4 style="color:#42adf4;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   Copyright &copy; <a href="#" style="color:black"></a>
                   <br>
                   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; All Rights Reserved <strong style="color:black" ></strong></h4>
            </div>
          </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
          </div>
      </footer>
      </body>
      </div>
    
      

    
    </html>