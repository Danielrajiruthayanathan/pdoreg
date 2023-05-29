<?php 
session_start(); 
$servername="localhost";
$username="root";
$password="";
$database="project";
try{
    $conn= new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e){
    echo "Connection Faild" .$e->getMessage();
}
if(isset($_POST['btn']))
{
    $Name=$_POST['Name'];
    $Mail=$_POST['Mail'];
    $Pass=$_POST['Pass'];

    $query="INSERT INTO pdo (Name, Mail, Pass) VALUES (:Name, :Mail, :Pass)";
    $query_run=$conn->prepare($query);
    
    $data =[
        ':Name'=>$Name,
        ':Mail'=>$Mail,
        ':Pass'=>$Pass
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: PDOR_REG.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Not Inserted";
        header('Location: PDO_REG.php');
        exit(0);
    }
}
?>     