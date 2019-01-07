<?php
$connect = mysqli_connect("localhost","root","","AngularPHP");
$data = json_decode(file_get_contents("php://input"));
if($data){
$btnname = $data->btnname;
if($btnname == "Add"){
$first_name = mysqli_real_escape_string($connect,$data->firstname);
$last_name = mysqli_real_escape_string($connect,$data->lastname);
$query= "INSERT INTO tbl_user(firstname,lastname) VALUES ('$first_name','$last_name')";
if(mysqli_query($connect,$query)){
echo "Data Added Successfully...";
}else{
echo "Error Occured Please check your Bloody Code.!!";
}        
}else if($btnname == "Update"){
$id=$data->id;
$first_name = mysqli_real_escape_string($connect,$data->firstname);
$last_name = mysqli_real_escape_string($connect,$data->lastname);
$query="UPDATE tbl_user SET firstname='$first_name',lastname='$last_name' WHERE id='$id'";
if(mysqli_query($connect,$query)){
echo "Data is updated successfully";
}else{
echo "Error Occured Please check your Bloody Code.!!";
}
}
}
?>