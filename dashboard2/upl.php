
<?php 
$imagecount = count(glob("../assets/prodimg/*")) + 1;


  
if(isset($_POST['upload'])){ 

$bcert = $_FILES['files'];
$bcname = $_FILES['files']['name'];
$bctmpname = $_FILES['files']['tmp_name'];
$bcsize = $_FILES['files']['size'];
$bcerror = $_FILES['files']['error'];
$bctype = $_FILES['files']['type'];
$bcext = explode('.', $bcname);
$bcactualexp = strtolower(end($bcext));
echo "<script>alert('$bcname')</script>";
echo "<script>alert('$bcactualexp')</script>";

$allowedext = array('jpg', 'jpeg', 'png');

if (in_array($bcactualexp, $allowedext)){
 if($bcerror ==0){
     if($bcsize < 1000000){
             $bcnamenew = "prod".$imagecount.".".$bcactualexp;
             $bcDestination = "../assets/prodimg/".$bcnamenew;
             move_uploaded_file($bctmpname, $bcDestination);

            
     
             echo "<script>alert('Uploaded Successfully!'); document.location.href = 'index.php?profile_pics';</script>";
     }
     else{
         echo "<script>alert('File is too big!')</script>";
     }
 }else{
     echo "<script>alert('There is an error uploading the file')</script>";
 }
}
else{
 echo "<script>alert('File Type is not allowed')</script>";
}
}



?>