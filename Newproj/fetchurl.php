<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';


$conn  = mysqli_connect($dbhost,$dbuser,'');
$link = mysqli_connect("localhost", "root", "");

if(! $conn){
  die('Could not connect connect: ') ;
}

//echo 'Successfully Connected';


$db='tww';
$conn  = mysqli_connect($dbhost,$dbuser,'',$db);
$link = mysqli_connect("localhost", "root", "", "tww");





$conn->close();
?>


<?php
$urlContent = file_get_contents('https://twitter.com/');

$dom = new DOMDocument();
@$dom->loadHTML($urlContent);
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");
$url;


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
		.blueee{ background-color: #d9e9f9;}
        .{
            margin: 0px;
            padding: 0px;
            font-family: sans-serif;
			color:white;
        }
        #sidebar
        {
            position: fixed;
            width: 200px;
            height: 100%;
            background: #151719;
            left:-200px;
            transition: all 500ms linear;
        }
        #sidebar ul li
        {
            color:#42adf4;
            list-style: none;
            padding:15px 10px;
            border-bottom: 1px solid rgba(100,100,100,.3);
        }
        #sidebar .toggle-btn
        {
            position:absolute;
			
            left:230px;
            top:20px;
        }
        #sidebar .toggle-btn span
        {
            display:block;
            width:30px;
            height:5px;
            background:#151719;
            margin:5px 0px;
			color:white;
        }
        #sidebar.active
        {
            left:0px;
        }
		
        .move{
            margin-left: 250px;
            
        }
    
    
    </style>
    <script type="text/javascript">
        
        function togglesidebar()
        {
            document.getElementById("sidebar").classList.toggle('active');
        }
    </script>
    
    
    
    <div id="sidebar">
        
    <div class="toggle-btn" onclick="togglesidebar();">
    <span></span>
    <span></span>
    <span></span>
        
    </div>
    <ul>
        <li><a href=fetchurl.php>HOME</a></li>
        <li><a href=fetchurl.php>URLS</a></li>
		<li><a href=index.php>LOGOUT</a></li>
    </ul>
    </div>
    
          
        
        <br/>
        <br/>
		<div class="blueee">
        <div class=move>
        <div class="row-top" >
            
              
          
          
           <h1 style="color:#42adf4;font-family:Courier New Header;font-weight:bold">&nbsp;&nbsp;<img src="image/logo.png" alt="image not found" height="50px" width="50px"/>&nbsp;&nbsp;Twitter</h1>
            
            <h3 style="color:black;font-family:cursive;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'we keep all your important feeds'</h3>
        </div>
    </div>
    <div class="move">
        <table>
            <tr>
              <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <br/>
                <br/>
                <th><div><button type="button" href="#" class="btn btn-info btn-md" class="move">URLS</button>&nbsp;
                </div></th>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><br/><br/>
                
        <?php
         for($i = 0; $i < $hrefs->length; $i++){
       $href = $hrefs->item($i);
       $url = $href->getAttribute('href');
      $url = filter_var($url, FILTER_SANITIZE_URL);
    // validate url
      if(!filter_var($url, FILTER_VALIDATE_URL) === false){
        
        //echo '<a href="'.$url.'">'.$url.'</a><br />';
        $url='<a href="'.$url.'">'.$url.'</a><br />';
		// Create connection
$conn = new mysqli($dbhost, $dbuser,'', $db);
$link = mysqli_connect("localhost", "root", "", "tww");

// Check connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */

/*$sql = "INSERT INTO imp(uname)VALUES ('$url')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}
// Create connection
$conn = new mysqli($dbhost, $dbuser,'', $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */

$sql = "SELECT id, uname FROM imp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " " . $row["id"]. " " . $row["uname"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();



//$conn->close();

  }
}
?>
                </td>
                <td></td>
                <td></td>
            </tr>
    </table>
	</div>
        
    </div>
