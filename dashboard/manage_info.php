<?php
include('includes/connect.php');

$select_query2 = "select * from shops";

$result_select2 = mysqli_query($conn, $select_query2);
if(isset($_POST['insert_product'])){ //name of input button, if it is set, then this have to insert whatever value in input field
    //create variable for input field
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $food_type = $_POST['food_type'];
    $store = $_POST['store'];

    
    
    //to avoid duplication of entry
    //select data from database
    $select_query = "Select * from foods where foodName = '$$food_name'" ;
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert('This product is already present in the database!')</script>";
    }
    else{

    //inserting the data
    //create variable query, then the insert into syntax
    //tblname  //columnName      //input field variable
    $insert_query = "insert into foods (foodName, foodPrice, foodType, RID) values ('$food_name', $food_price, '$food_type', $store)";
    
    //execute query
    //create variable for query result with 2 parameters(connection variable, query variable)
    $result = mysqli_query($conn, $insert_query);

    if ($result){
      echo "<script>alert('Product has been inserted successfully!')</script>";
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
                            <label for="food_name" class="control-label mb-1">Product Name</label>
                            <input id="food_name" name="food_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                        </div>
                        
                        <div class="form-group">
                            <label for="food_price" class="control-label mb-1">Price</label>
                            <input id="food_price" name="food_price" type="number" class="form-control cc-number identified visa" value="" >
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="food_type" class="control-label mb-1">Type</label>
                                    <input id="food_type" name="food_type" type="text" class="form-control cc-exp" value="" >
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>
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
                            <button id="payment-button" type="submit" name= "insert_product" class="btn btn-lg btn-info btn-block">
                                
                                <span id="payment-button-amount">Insert</span>
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- .card -->
</div><!--/.col-->