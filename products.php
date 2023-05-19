<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


    

$mail = new PHPMailer(true);
  
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "food_park";
$conn = new mysqli($hostName, $userName, $password, $databaseName);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$select_query2 = "select * from shops";

$result_select2 = mysqli_query($conn, $select_query2);
  ?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/images/icon.png" type="image/gif" sizes="16x16">
    <title>A's Kai Garden Foodpark</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
    <body>
    
    <button style="right: 0;position:fixed;bottom:0; padding: 10px; margin: 10px; Border: none; Background-color: #ed3b3b; color: white; font-weight: bold; border-radius: 10px; font-size: 20px;"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemModal"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</button>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                      <a href="index.php" class="logo">A's Kai Garden <em>  Food Park</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php" class="active">Products</a></li>

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.php">About Us</a>
                                    <a class="dropdown-item" href="blog.php">Blog</a>
                                    
                                  
                                </div>
                            </li>
                            <li><a href="contact.php">Contact</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Products</em></h2>
                        <p>Explore and Search for our Products</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <form action ='' method = "GET">
              <div class="row">
                <div class="col md-4">
                  <div class="input-group mb-3">
                    <form action="" method = "GET">
                      
                      <input type="text" name="search" value="<?php if(isset($_GET['search'])) {echo $_GET['search']; }?>" class="form-control" placeholder="Search Menu">
                      <button type="submit" class="btn btn-primary">Search</button>
                  </div>
                </div>
                <div class="col md-4">
                  <div class="input-group mb-3">
                  </form>
                    <select id="store" name="store" class="form-control cc-cvc" value="" >
                        <option value="">---Select Option---</option>
                        <?php while($row2 = mysqli_fetch_array($result_select2)):;?>
                        <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
                        <?php endwhile;?>
                    </select>
                    <button type = "submit" class = "btn btn-primary">
                      Filter
                    </button>
                  </div>
                </div>
                <div class="col md-4">
                  <div class="input-group mb-3">
                    <select name = "sort_alpha_price" class = "form-control">
                      <option value="">---Select Option---</option>
                      <option value="a-z" <?php if (isset($_GET['sort_alpha_price']) && $_GET['sort_alpha_price'] == "a-z"){echo "Selected"; }?>> A-Z (Ascending Order)</option>
                      <option value="z-a" <?php if (isset($_GET['sort_alpha_price']) && $_GET['sort_alpha_price'] == "z-a"){echo "Selected"; }?>> Z-A (Descending Order)</option>
                      <option value="l-h" <?php if (isset($_GET['sort_alpha_price']) && $_GET['sort_alpha_price'] == "l-h"){echo "Selected"; }?>> Lowest-Highest Price (Ascending Order)</option>
                      <option value="h-l" <?php if (isset($_GET['sort_alpha_price']) && $_GET['sort_alpha_price'] == "h-l"){echo "Selected"; }?>> Highest-Lowest Price (Descending Order)</option>
                    </select>
                    <button type = "submit" class = "btn btn-primary">
                      Sort
                    </button>
                  </div>
                </div>
              </div>
            </form>


            <div class="row">
                
                <?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "food_park";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$db= $conn;
$tableName="foods";
$columns= ['foodID', 'foodName','foodPrice','foodType',];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
$sort_parameter = "foodID";
$sort_option ="ASC";
$store_filter = "";

if(isset($_GET['sort_alpha_price']))
{
  if($_GET['sort_alpha_price'] == "a-z")
  {
    $sort_parameter = "foodName";
    $sort_option = "ASC";
  }
  elseif($_GET['sort_alpha_price'] == "z-a")
  {
    $sort_parameter = "foodName";
    $sort_option = "DESC";
  }
  elseif($_GET['sort_alpha_price'] == "l-h")
  {
    $sort_parameter = "foodPrice";
    $sort_option = "ASC";
  }
  elseif($_GET['sort_alpha_price'] == "h-l")
  {
    $sort_parameter = "foodPrice";
    $sort_option = "DESC";
  }
}

if (isset($_GET['search']))
{
  $search_value = $_GET["search"];
  $store_filter = $_GET['store'];
  if ($store_filter == ""){
    $query = "SELECT ".$columnName." FROM $tableName"." WHERE foodName LIKE '%$search_value%' ORDER BY $sort_parameter $sort_option";
  }
  else{
    $query = "SELECT ".$columnName." FROM $tableName"." WHERE foodName LIKE '%$search_value%' AND RID = $store_filter ORDER BY $sort_parameter $sort_option";
  }
  if(empty($query)){
    $msg= "Product not found.";
  }
}
else{
  $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY $sort_parameter $sort_option";
}

$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}

return $msg;

}
?>


<?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
    <div class="col-lg-4">
      <form action="" method="post">
      <div class="trainer-item">
          <div class="image-thumb">
              <img src="assets/prodimg/<?php echo $data['foodName']??'';?>.jpg" alt="">
          </div>
          <div class="down-content">
              <span>
                  <?php echo $data['foodPrice']??''; ?>
              </span>

              <h4><?php echo $data['foodName']??''; ?></h4>

              <p><?php echo $data['foodType']??''; ?></p>

              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#itemModal"
              data-name="<?php echo $data['foodName']?>"
              data-type="<?php echo $data['foodType']?>"
              data-price="<?php echo $data['foodPrice']?>"
              data-index="<?php echo $sn?>" name="<?php echo $sn?>btn">
                + Add to Cart
              </button>
            
          </div>
          <?php 

if(isset($_POST[$sn.'btn'])){
$conn->query("INSERT INTO cart (fname, ftype, fprice) VALUES ('".$data['foodName']."','".$data['foodType']."','".$data['foodPrice']."')");


echo "<script>alert('Added to cart!')</script>;";



}


?>



      </div></form>
    </div>

     <?php
      $sn++;}}else{ ?>
      
    <?php echo $fetchData; ?>

    <?php
    }?>

    </div>
    
   
            <br>
                
            <nav>
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>

        </div>
    </section>

    <?php 

if(isset($_POST[$sn.'btn'])){
$_SESSION['name'] = "qqqqqq";
echo "<script>alert('Sent!')</script>;";



}


?>
    <!-- ***** Fleet Ends ***** -->

    <!-- ***** Modal Start **** --><form action="" method="post"> 
    <div class="modal fade m-6" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
     
    <div class="modal-dialog" role="document">
        <div class="modal-content p-4">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <table class="table table-bordered p-2">
  <thead>



      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php
 

  $db= $conn;
  $tableName="cart";
  $columns= ['id', 'fname', 'ftype', 'fprice'];
  
  function fetch_data30($db, $tableName, $columns){
   if(empty($db)){
    $msg= "Database connection error";
   }elseif (empty($columns) || !is_array($columns)) {
    $msg="columns Name must be defined in an indexed array";
   }elseif(empty($tableName)){
     $msg= "Table Name is empty";
  }else{
  $columnName = implode(", ", $columns);
  $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id Asc";
  $result = $db->query($query);
  if($result== true){ 
   if ($result->num_rows > 0) {
      $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
      $msg= $row;
   } else {
      $msg= "Your Cart is Empty"; 
   }
  }else{
    $msg= mysqli_error($db);
  }
  }
  
  return $msg;
  
  }
  $fetchData = fetch_data30($db, $tableName, $columns);

      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
    
    <tr>
    
    <th scope="col"><?php echo $data['fname'];?></th>
    <th scope="col"><?php echo $data['ftype'];?></th>
    <th scope="col"><?php echo $data['fprice'];?></th>
  </tr>                                  



     <?php
      $sn++;}}else{ ?>
      
    <?php echo $fetchData; ?>

    <?php
    }?>


   
  </tbody>
</table>
<div class=row>
<label>Enter Contact Number and Name</label>
<input type="text" name="Name">

<button type="submit" name="reset" style="margin:10px; border: none; Background-color: black; color: white; font-weight: bold; height: 40px;">Reset Cart</button>
<button type="submit" name="checkout" style="margin:10px; border: none; Background-color: black; color: white; font-weight: bold; height: 40px;">Checkout</button>
              


</form>
            </div>
          </div>
          <?php 
if(isset($_POST['reset'])){
  $conn->query("DELETE FROM cart");


echo "<script>alert('Cart Resetted!')</script>;";

}

if(isset($_POST['checkout'])){
 
  $selectQuery = "SELECT * FROM `cart` ORDER BY `id` ASC";
  $result = mysqli_query($conn,$selectQuery);
  if(mysqli_num_rows($result) > 0){
    while($row = $result->fetch_assoc()){
      $string = $string." <br> Food Name: ".$row['fname']." <br>Food Price: ".$row['fprice']."<br>";
      
    }
  }else{
    echo "<script>console.log('try')</script>";
  }
$csname = $_POST['Name'];

  $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
  $mail->Username = 'ediwawkiki@gmail.com';
  $mail->Password = 'sjixyrlrwbdixtav';
 $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
   
  $mail->setFrom('ediwawkiki@gmail.com');
   
  $mail->addAddress("ramosalleneid01@gmail.com");
   
  $mail->isHTML(true);
   
   $mail->Subject = 'Hello '.$csname." wanst to order this";
   $mail->Body =  $string;
   
  $mail->send();
  echo "<script>alert('Sent!')</script>;";
  $conn->query("INSERT INTO history (hfname, hftype, hfprice) SELECT fname, ftype, fprice from cart");
  $conn->query("DELETE FROM cart");
  echo "window.location.href = 'products.php'";



}
?>
        </div>
      </div>
    </div>
    <!-- ***** Modal End **** -->





    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        BSU - CICS Lipa -  GROUP Project
                    </p>
                    
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>


    
  </body>
</html>

<?php
	// Account details
;
?>


</body>

</html>

