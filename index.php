<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style/index.css">
    <title>Crud_product</title>
    <?php include('function.php') ?>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="form d-flex justify-content-between w-100">
            <div class="menu d-flex flex-column gap-3 bg-secondary p-3">
                <a href="index.php" class="text-decoration-none">Product<i class="fa-solid fa-store ms-2"></i></a>
                <a href="aboutme.php" class="text-decoration-none">About Me<i class="fa-solid fa-address-card ms-2"></i></a>
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            Are you sure you want to delete this product?
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <form method="POST" action="">
                                <input type="hidden" name="delete_id" id="delete_id_input">
                                <button type="submit" name="btn_delete_confirm" class="btn btn-success">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page_active p-3">
                <a class="btn btn-primary mb-4" href="productadd.php"><i class="fa-solid fa-cart-plus me-2"></i><span>Add New</span></a>
                <div class="table-container">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th class="text-center actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php showproduct() ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function setDeleteId(id) {
        // Store the ID in a hidden input for the form submission
        $('#delete_id_input').val(id);
    }
</script>

</html>