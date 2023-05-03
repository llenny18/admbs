<!DOCTYPE html>

<?php
include('includes/connect.php')
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
                            <label for="cc-payment" class="control-label mb-1">Product Name</label>
                            <input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
                        </div>
                        
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Price</label>
                            <input id="cc-number" name="cc-number" type="number" class="form-control cc-number identified visa" value="" >
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Type</label>
                                    <input id="cc-exp" name="cc-exp" type="text" class="form-control cc-exp" value="" >
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Stock</label>
                                <div class="input-group">
                                    <input id="x_card_code" name="x_card_code" type="Number" class="form-control cc-cvc" value="" >
                                    
                                </div>
                            </div>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                
                                <span id="payment-button-amount">Insert</span>
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- .card -->
</div><!--/.col-->

<div class="col-lg-6 pt-3">
    <div class="card">
        <div class="card-header">Employee Register</div>
        <div class="card-body card-block">
            <form action="#" method="post" class="">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" id="username2" name="username2" placeholder="Username" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" id="email2" name="email2" placeholder="Email" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" id="password2" name="password2" placeholder="Password" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                    </div>
                </div>
                <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Submit</button></div>
            </form>
        </div>
    </div>
</div>
