<?php 
require 'connect.php';

  header('Content-Type: application/json; charset=utf-8');

   $category = $_POST['searchQuery'];
   
   if(isset($category)) {    
   $result = mysqli_query($con,"SELECT * FROM category WHERE cat_name LIKE '%$category%'");
    }else{
		 $result = mysqli_query($con,"SELECT * FROM category");
	}


  while($row=mysqli_fetch_assoc($result)){
	  $output[]=$row;	  
  }
  
  print(json_encode($output,JSON_UNESCAPED_UNICODE));
  
  // 4 clear
mysqli_free_result($result);
//5- close connection
mysqli_close($con);
  ?>