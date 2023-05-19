<!DOCTYPE html>

<?php
include('includes/connect.php');

$select_query2 = "select * from shops";

$result_select2 = mysqli_query($conn, $select_query2);
if(isset($_POST['register'])){ //name of input button, if it is set, then this have to insert whatever value in input field
    //create variable for input field
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $store = $_POST['store'];

    
    
    //to avoid duplication of entry
    //select data from database
    $select_query = "Select * from user where uname = '$$food_name'" ;
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert('This product is already present in the database!')</script>";
    }
    else{

    //inserting the data
    //create variable query, then the insert into syntax
    //tblname  //columnName      //input field variable
    $insert_query = "insert into user (uname, pass, RID) values ('$food_name', '$food_price', $store)";
    
    //execute query
    //create variable for query result with 2 parameters(connection variable, query variable)
    $result = mysqli_query($conn, $insert_query);

    if ($result){
      echo "<script>alert('New Admin has been registered!')</script>";
    }
    else {
        echo"<script>alert('Error Detected!')</script>";
    }
    }

  }
  
?>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Insert Food</strong>
        </div>
        <div class="card-body">
            <!-- Credit Card -->
            <div id="pay-invoice">
                <div class="card-body">
                    <form action="#" method="post" novalidate="novalidate">
                        <div class="form-group">
                            <label for="food_name" class="control-label mb-1">Username</label>
                            <input id="food_name" name="food_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                        </div>
                        
                        <div class="form-group">
                            <label for="food_price" class="control-label mb-1">Password</label>
                            <input id="food_price" name="food_price" type="text" class="form-control cc-number identified visa" value="" >
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="store" class="control-label mb-1">Store</label>
                                <div class="input-group">
                                    <select id="store" name="store" class="form-control cc-cvc" value="" >
                                        <?php while($row2 = mysqli_fetch_array($result_select2)):;?>
                                        <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
                                        <?php endwhile;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <br>
                            <button id="payment-button" type="submit" name= "register" class="btn btn-lg btn-info btn-block">
                                
                                <span id="payment-button-amount">Register</span>
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- .card -->
</div><!--/.col-->

<body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
