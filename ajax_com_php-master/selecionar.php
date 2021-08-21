<?php
    $con = mysqli_connect('localhost' , 'root' , '' , 'novobanco') ; 
    $query = mysqli_query($con , 'SELECT * FROM comments') ; 
    
    while($result = mysqli_fetch_array($query)){
    	echo json_encode('name'.$result['name']) ;
    } 
    