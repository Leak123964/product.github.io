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
    <title>Add Product</title>
    <?php include('function.php') ?>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="form d-flex">
            <div class="menu d-flex flex-column gap-3 bg-secondary p-3 text-white">
                <a href="index.php" class="text-decoration-none text-white">Product<i class="fa-solid fa-store ms-2"></i></a>
                <a href="aboutme.php" class="text-decoration-none text-white">About Me<i class="fa-solid fa-address-card ms-2"></i></a>
            </div>
            <div class="page_active p-3">
                <a class="btn btn-primary mb-4" href="index.php"><i class="fa-regular fa-rectangle-list me-2"></i><span>View List Product</span></a>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input">
                        <label for="img_product">Photo Product</label><br>
                        <img src="image/upload.jpg" id="img_upload" alt="" style="width: 200px;height: 150px;object-fit: contain;">
                        <input type="file" name="img_product" id="img_product" class="form-control mt-2" required><br>
                        <label for="name_product">Product name</label>
                        <input type="text" name="name_product" id="name_product" class="form-control mt-2" required><br>
                        <label for="price_product">Price (USD)</label>
                        <input type="number" name="price_product" id="price_product" class="form-control mt-2" min="0" step="0.01" required><br>
                        <label for="category_product">Category</label>
                        <select name="category_product" id="category_product" class="form-select mt-2" required>
                            <option value="">Select a category</option>
                            <option value="Drink">Drink</option>
                            <option value="Food">Food</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="mt-5 float-end">
                            <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" name="btnsave" class="btn btn-primary ms-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="javascript/index.js"></script>
</body>
</html>
