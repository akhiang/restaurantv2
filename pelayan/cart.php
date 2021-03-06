<?php
    include "../conn.php";
    require_once "../header.php";
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		if ($_SESSION['role'] == "kasir") {
			header("location: ../kasir/index.php");
		}
		else if ($_SESSION['role'] == "admin") {
			header("location: ../admin/index.php");
		}
	}
	else {
		header('location: ../index.php');
	}
?>

    <main class="wrapper-all">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-4">
                    <h3>Cart</h3>
                    <div class="order-list-container p-3">
                        <div class="d-flex flex-row-reverse mb-3">
                            <a href="./order.php" class="btn btn-success btn-sm ml-auto">Tambah Menu Lain</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="cart-table">         
                                <thead class="text-center">
                                    <tr>
                                        <th class="remove"></th>
                                        <th>Menu</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cart-body"></tbody>
                            </table>                
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-4">
                    <h3>Cart Total</h3>
                    <div class="order-list-container p-3" id="cart-total"></div>
                </div>               
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menu Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="menu-note-modal">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Checkout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to proceed to checkout ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <a href="./checkout.php" class="btn btn-success">Proceed to checkout</a>                    
                </div>
            </div>
        </div>
    </div>

<?php
    require_once "../footer.php"
?>