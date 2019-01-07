<?php
$connect = mysqli_connect("localhost","root","","AngularPHP");
$op = array();
$query = "SELECT * FROM tbl_user";
$result = mysqli_query($connect,$query);
if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_array($result)){
           $op[] = $row;
    }
    echo json_encode($op);
}else{
    
}
?>