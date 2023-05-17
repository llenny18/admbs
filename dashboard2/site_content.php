<?php
include('includes/connect.php');

  


?>

<div class ="row" style="margin: 3px;">
        
        <?php
        $dirname = "./images/";
    $images = scandir($dirname);
    $ignore = Array(".", "..");
    foreach($images as $curimg){
        if(!in_array($curimg, $ignore)) {
    ?><div class="col-md-4 p-3">
                        <div class="card">
                            <img class="card-img-top" src="./images/<?php echo $curimg?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3"><?php echo $curimg?></h4>
                                </div>
                        </div>
                        </div>

                        <?php




}
}?>

                 
                   


</div>  



<div class ="row" style="margin: 3px;">
        
        <?php
        $dirname = "../assets/images/";
    $images = scandir($dirname);
    $ignore = Array(".", "..");
    foreach($images as $curimg){
        if(!in_array($curimg, $ignore)) {
    ?><div class="col-md-4 p-3">
                        <div class="card">
                            <img class="card-img-top" src="../assets/images//<?php echo $curimg?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3"><?php echo $curimg?></h4>
                                </div>
                        </div>
                        </div>

                        <?php




}
}?>

                 
                   


</div>  