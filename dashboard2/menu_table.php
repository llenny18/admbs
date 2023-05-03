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
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                <?php
                                $db= $conn;
                                $tableName="foods";
                                $columns= ['foodid', 'foodName','foodPrice','foodtype','quantity'];
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
                                    };


                                if(is_array($fetchData)){      
                                $sn=1;
                                foreach($fetchData as $data){
                                ?>

                                <tr>
                                    <td><?php echo $data['foodid']??''; ?></td>
                                    <td><?php echo $data['foodName']??''; ?></td>
                                    <td><?php echo $data['foodPrice']??''; ?></td>
                                    <td><?php echo $data['foodtype']??''; ?></td>
                                    <td><?php echo $data['quantity']??''; ?></td>
                                </tr>

                                <?php
                                $sn++;}}else{
                                echo $fetchData;
                                }?>                 
                                                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

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