<?php

session_start();
if(isset($_FILES['image'])){
// connect database
$dbhost = 'localhost';
$database = 'sample_task';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$database);

if( !$conn ) {
	echo "failed to connect to database";
}
$error = array();
$image_name = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_tmp = $_FILES['image']['tmp_name'];
$image_type = $_FILES['image']['type'];
$name= $_POST['name'];
$age = $_POST['age'];
echo $name;
$image_extension = strtolower(end(explode('.', $image_name)));
// extract the extension of the uploaded image
$extensions= array("jpeg","jpg","png");
if(in_array($image_extension,$extensions)=== false){
	// check if the uploaded extensin is in the array
$errors[]="extension not allowed, please choose a JPEG, JPG or PNG file.";
}
if($image_size > 2097152) {
	// check the size of the uploaded file or image
$errors[]='File size must be excately 2 MB';
}
if(empty($errors)==true) {
	// store the uploaded image if there is no error
move_uploaded_file($image_tmp,"public/".$image_name);
echo "Success";
}else{
print_r($errors);
}

$sql = "INSERT INTO sample (name, image) VALUES ('$name', '$image_name')";
if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
// extract data from database
$sql = 'SELECT * FROM sample';
if($result = mysqli_query($conn,$sql)){
	if(mysqli_num_rows($result)> 0 )
	{
		$data = array();
		$image = array();
		$name = array();
		while($row = mysqli_fetch_array($result))
		{
			array_push($name,$row['name']);
			array_push($image,$row['image']);
			
	  }
	  array_push($data,$name,$image);
	    $_SESSION['record'] = $data;
	   
	}
}
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>