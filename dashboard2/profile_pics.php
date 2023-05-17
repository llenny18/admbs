<!DOCTYPE html>

<?php
include('includes/connect.php')
?>
<div style="background-color: White; padding: 20px; margin: 20px; top:20%;">
<form action="" method="post" action="upl.php"
			  enctype="multipart/form-data"> 
  <div class="form-group">
    <b><label for="exampleFormControlFile1">Upload Product Image Here Note: Only '.jpg' is allowed</label></b>
    <input type="file" id="file-input" name="files" class="form-control-file" required>
   
  </div>
  <button type="submit" name="upload">Upload</button>
</form>
</div>

<body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>



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

$allowedext = array('jpg');

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