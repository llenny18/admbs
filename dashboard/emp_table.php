<?php
include('includes/connect.php')
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
                                <strong class="card-title">Employees Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>RID</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
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
$tableName="user";
$columns= ['UID', 'uname','pass','RID'];
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
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY UID Asc";
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
                                            <td><?php echo $data['UID']??''; ?></td>
                                            <td><?php echo $data['uname']??''; ?></td>
                                            <td><?php echo $data['pass']??''; ?></td>
                                            <td><?php echo $data['RID']??''; ?></td>
                                            <form action="" method="post"><td><button name ="<?php echo $sn?>dels" class="del" name="del" >Delete</button>
                                            <button type="submit"  name ="<?php echo $sn?>upls" class="del m-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Pick</button>
                                            <button type="button"  name ="<?php echo $sn?>upls" class="del m-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Update</button></td></form>
                                            
                                            <?php 

if(isset($_POST[$sn.'dels'])){
    $del = $conn->query("DELETE FROM user where UID='".$data['UID']."'");

                                            echo "<script>document.location.href = 'index.php?emp_table';</script>";

                                        }
                                        if(isset($_POST[$sn.'upls'])){
                                            $_SESSION['eid'] = $data['UID'];
                                            $_SESSION['ename'] = $data['uname'];
                                            $_SESSION['epass'] = $data['pass'];
                                            $_SESSION['erid'] = $data['RID'];
                                            

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
        <form action="" method="post">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">UID</label>
            <input type="text" name="uid" class="form-control" id="recipient-name" value="<?php echo $_SESSION['eid'];?>" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">username</label>
            <input type="text" name="username"  class="form-control" id="recipient-name" value="<?php echo $_SESSION['ename'];?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Pass</label>
            <input type="text" name="password"  class="form-control" id="recipient-name" value="<?php echo $_SESSION['epass'];?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">RID</label>
            <input type="text" name="ustoreid"  class="form-control" id="recipient-name" value="<?php echo $_SESSION['erid'];?>">
          </div>
          
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="upd">Update</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<?php 
if(isset($_POST['upd'])){
$usid = $_POST['uid'];
$usname = $_POST['username'];
$uspass = $_POST['password'];
$usrid= $_POST['ustoreid'];

$conn->query("UPDATE user SET uname = '$usname', pass= '$uspass', RID ='$usrid' where UID ='$usid'");

echo "<script>document.location.href = 'index.php?emp_table';</script>";

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