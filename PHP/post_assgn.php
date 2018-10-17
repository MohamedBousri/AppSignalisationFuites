<?php
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
if (isset($_POST['code']) && isset($_POST['nom']) && isset($_POST['telephone'])
     && isset($_POST['type']) && isset($_POST['adresse']) && isset($_POST['longitude']) 
     && isset($_POST['latitude'])  && isset($_POST['detail'])  && isset($_POST['image']) && isset($_POST['status']) ) {
 
    $name = $_POST['nom'];//
    $code = $_POST['code'];
    $telephone = $_POST['telephone'];
    $type=$_POST['type'];
    $adresse=$_POST['adresse'];
    $longitude=$_POST['longitude'];
    $latitude=$_POST['latitude'];
    $detail=$_POST['detail'];
    $image=$_POST['image'];
    $status=$_POST['status'];
    
 
    
   // require_once __DIR__ . '/db_connect.php';
    require_once __DIR__.'/db_config.php';
    
    //$db = new DB_CONNECT();
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysqli_error());
    $db = mysqli_select_db($con,DB_DATABASE) or die(mysqli_error()) or die(mysqli_error());
    
    $result = mysqli_query($con,"INSERT INTO client(code, nom, telephone) VALUES('$code', '$name', '$telephone')");
    $result1 = mysqli_query($con,"INSERT INTO assignissment(adresse,type,longitude,	latitude,codeclient,detail,image,status) 
    VALUES('$adresse', '$type', '$longitude','$latitude','$code','$detail','$image','$status')");

if ($result && $result1) {
        
    $response["success"] = 1;
    $response["message"] = "formulaire envoyé avec succès.";

    
    echo json_encode($response);
} else {
    
    if($result1){
        $response["success"] = 2;
        $response["message"] = "probablement client deja existant!.";
    }
    else{
        $response["success"] = 3;
        $response["message"] = "Oops! An error occurred.";
    }
    

    
    echo json_encode($response);
}
} else {

$response["success"] = 0;
$response["message"] = "Required field(s) is missing";


echo json_encode($response);
}
?>