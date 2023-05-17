<?php

include('includes/connect.php');

?>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Menu Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>RID</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php

$db= $conn;
$tableName="foods";
$columns= ['foodid', 'foodName','foodPrice','foodtype','RID'];
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
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY foodid Asc";
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
    
    <tr>
                                            <td><?php echo $data['foodid']??''; ?></td>
                                            <td><?php echo $data['foodName']??''; ?></td>
                                            <td><?php echo $data['foodPrice']??''; ?></td>
                                            <td><?php echo $data['foodtype']??''; ?></td>
                                            <td><?php echo $data['RID']??''; ?></td>
                                            <form action="" method="post"><td><button name ="<?php echo $sn?>dels" class="del" name="del" >Delete</button>
                                            <button type="submit"  name ="<?php echo $sn?>upls" class="del m-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Pick</button>
                                            <button type="button"  name ="<?php echo $sn?>upls" class="del m-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Update</button></td></form>
                                            
                                            <?php 

if(isset($_POST[$sn.'dels'])){
    $del = $conn->query("DELETE FROM foods where foodID='".$data['foodid']."'");

                                            echo "<script>document.location.href = 'index.php?menu_table';</script>";

                                        }
                                        if(isset($_POST[$sn.'upls'])){
                                            $_SESSION['id'] = $data['foodid'];
                                            $_SESSION['fname'] = $data['foodName'];
                                            $_SESSION['fprice'] = $data['foodPrice'];
                                            $_SESSION['ftype'] = $data['foodtype'];
                                            $_SESSION['frid'] = $data['RID'];

                                        }
                                        ?>
                                        
                                        
                                        </tr>

     <?php
      $sn++;}}else{ ?>
      
    <?php echo $fetchData; ?>

    <?php
    }?>





                               
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form action ="" method="post">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Food ID</label>
            <input type="text" name="foid" class="form-control" id="recipient-name" value="<?php echo $_SESSION['id'];?>" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Food Name</label>
            <input type="text" name="foname" class="form-control" id="recipient-name" value="<?php echo $_SESSION['fname'];?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Food Type</label>
            <input type="text" name="fotype" class="form-control" id="recipient-name" value="<?php echo $_SESSION['ftype'];?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price</label>
            <input type="text" name="foprice" class="form-control" id="recipient-name" value="<?php echo $_SESSION['fprice'];?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Store ID</label>
            <input type="text" name="fostid" class="form-control" id="recipient-name" value="<?php echo $_SESSION['frid'];?>">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name ="upd" class="btn btn-primary">Update</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<?php 
if(isset($_POST['upd'])){
$foid = $_POST['foid'];
$foname = $_POST['foname'];
$fotype = $_POST['fotype'];
$foprice = $_POST['foprice'];
$fostid = $_POST['fostid'];

$conn->query("UPDATE foods SET  foodName ='$foname', foodType ='$fotype', foodPrice ='$foprice', RID ='$fostid' where foodID ='$foid'");

echo "<script>document.location.href = 'index.php?menu_table';</script>";

}




?>


<!-- Scripts -->
<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.php5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/init/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>