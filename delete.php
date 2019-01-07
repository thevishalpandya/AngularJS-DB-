<?php
$connect = mysqli_connect("localhost","root","","AngularPHP");
$data = json_decode(file_get_contents("php://input"));
if($data){
$id = $data->id;
$query = "DELETE FROM tbl_user WHERE id='$id'";
if(mysqli_query($connect,$query)){
echo "Data is deleted successfully..!!";
}else{
echo "Error Occured Please check your Bloody Code..!!";
}
}
?>