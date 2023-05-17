<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  
  
  ?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/images/icon.png" type="image/gif" sizes="16x16">
    <title>Lourdes Foodpark</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
    <body>
    
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
                      <a href="index.php" class="logo">Lourdes <em>  Food Park</em></a>
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
                                    <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                                  
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
                    <select name = "sort_alpha_price" class = "form-control">
                      <option value="">---Select Option---</option>
                      <option value="a-z" <?php if (isset($_GET['sort_alpha_price']) && $_GET['sort_alpha_price'] == "a-z"){echo "Selected"; }?>> A-Z (Ascending Order)</option>
                      <option value="z-a" <?php if (isset($_GET['sort_alpha_price']) && $_GET['sort_alpha_price'] == "z-a"){echo "Selected"; }?>> Z-A (Descending Order)</option>
                      <option value="l-h" <?php if (isset($_GET['sort_alpha_price']) && $_GET['sort_alpha_price'] == "l-h"){echo "Selected"; }?>> Lowest-Highest Price (Ascending Order)</option>
                      <option value="h-l" <?php if (isset($_GET['sort_alpha_price']) && $_GET['sort_alpha_price'] == "h-l"){echo "Selected"; }?>> Highest-Lowest Price (Descending Order)</option>
                    </select>
                    <button type = "submit" class = "input-group-text btn btn-primary" id="basic-addon2">
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
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY $sort_parameter $sort_option";
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
      <div class="trainer-item">
          <div class="image-thumb">
              <img src="assets/prodimg/prod<?php echo $sn?>.jpg" alt="">
          </div>
          <div class="down-content">
              <span>
                  <?php echo $data['foodPrice']??''; ?>
              </span>

              <h4><?php echo $data['foodName']??''; ?></h4>

              <p><?php echo $data['foodType']??''; ?></p>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemModal"
              data-name="<?php echo $data['foodName']?>"
              data-type="<?php echo $data['foodType']?>"
              data-price="<?php echo $data['foodPrice']?>"
              data-index="<?php echo $sn?>" name="<?php echo $sn?>btn">
                + Order
              </button>
          </div>
          



      </div>
    </div>

     <?php
      $sn++;}}else{ ?>
      
    <?php echo $fetchData; ?>

    <?php
    }?>

    </div>
    
    <?php 
for ($x = 0; $x <= 100; $x+=1) {
if(isset($_POST[$x.'btn'])){
$_SESSION['name'] = "qqqqqq";



}}


?>
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

   
    <!-- ***** Fleet Ends ***** -->

    <!-- ***** Modal Start **** -->
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row pb-2">
                <img src="assets/images/product-1.jpg" class="img-fluid rounded" id="item-img" alt="">
              </div>
              <div class="row flex-nowrap my-2">
                <div class="col-md-6">
                  <h5 id="item-name">Name</h5>
                  
                  <p id="item-type">Item Type</p>
                </div>
                <div class="col-md-6">
                  <h5 id="item-price">Item Price</h5>
                  <p>Base Price</p>
                </div>
              </div>
              <form action="" method="post">     
                <div class="form-row my-3">
                  <label for="message-text" class="col-form-label">Note to restaurant:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
                <div class="form-row justify-content-center">
                  <div class="input-group col-4">
                    <div class="input-group-prepend">
                      <button type="button" class="quantity-left-minus btn btn-light btn-number"  data-type="minus" data-field="">
                        <span class="fa fa-minus"></span>
                      </button>
                    </div>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1">
                    <div class="input-group-append ">
                      <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field="">
                        <span class="fa fa-plus"></span>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button name="order" type ="submit" class="btn btn-primary" >Add to Order</button>
          </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- ***** Modal End **** -->
<?php 

if(isset($_POST['order'])){
echo "<script>alert('".$_SESSION['name']."');</script>";
 
  //$name = $_POST['name'];
  
  
 //$mail->isSMTP();
  //$mail->Host = 'smtp.gmail.com';
  //$mail->SMTPAuth = true;
 // $mail->Username = 'schoolverif@gmail.com';
 // $mail->Password = 'ehvtfmsvsfgmefuz';
//  $mail->SMTPSecure = 'ssl';
 // $mail->Port = 465;
  
 // $mail->setFrom('schoolverif@gmail.com');
  
 // $mail->addAddress("ediwawkiki@gmail.com");
  
 // $mail->isHTML(true);
  
  //$mail->Subject = 'Hello '.$_POST[$i.'email'].' this is your verification code!';
  //$mail->Body =  "New booking by ".$client."<br> Reserved this service: ".$name.". <br> Price: ".$price.".<br> Size: ".$size.".<br> Category: ".$category.".<br> Date: ".$date.".<br> Time: ".$time.".<br> Phone Number: ".$email;
  
 // $mail->send();
 // echo "<script>alert('Sent!')</script>;";
  
  }

?>





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


</body>

</html>

