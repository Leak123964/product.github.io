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
    <?php include('function.php');
    $idpro = $_GET['id'];
    $sql = "SELECT * FROM `tb_crud_product` WHERE `proid`='$idpro'";
    $rs = $con->query($sql);
    $product = mysqli_fetch_assoc($rs);
    ?>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="form d-flex justify-content-between w-100">
            <div class="menu d-flex flex-column gap-3 bg-secondary p-3">
                <a href="index.php" class="text-decoration-none">Product<i class="fa-solid fa-store ms-2"></i></a>
                <a href="aboutme.php" class="text-decoration-none">About Me<i class="fa-solid fa-address-card ms-2"></i></a>
            </div>
            <div class="page_active p-3">
                <a class="btn btn-primary mb-4" href="index.php"><i class="fa-regular fa-rectangle-list me-2"></i><span>View List Product</span></a>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $product['proid']; ?>">
                    <input type="hidden" name="old_image" value="<?php echo $product['proimage']; ?>">
                    <div class="mb-3">
                        <label for="img_product" class="form-label">Photo Product</label><br>
                        <img src="image/<?php echo $product['proimage']; ?>" alt="Current Product Image" style="width: 200px;height: 150px;object-fit: contain;" class="current-image img-thumbnail"><br>
                        <input type="file" value="<?php echo $product['proimage'];?>" name="img_product" id="img_product" class="form-control mt-2" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="name_product" class="form-label">Product name</label>
                        <input type="text" name="name_product" id="name_product" class="form-control" value="<?php echo htmlspecialchars($product['proname']); ?>" required>
                    </div>  
                    <div class="mb-3">
                        <label for="price_product" class="form-label">Price (USD)</label>
                        <input type="number" name="price_product" id="price_product" class="form-control" value="<?php echo htmlspecialchars($product['proprice']); ?>" min="0" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_product" class="form-label">Category</label>
                        <select name="category_product" id="category_product" class="form-select" required>
                            <option value="Drink" <?php echo ($product['procategory'] == 'Drink') ? 'selected' : ''; ?>>Drink</option>
                            <option value="Food" <?php echo ($product['procategory'] == 'Food') ? 'selected' : ''; ?>>Food</option>
                            <option value="Electronics" <?php echo ($product['procategory'] == 'Electronics') ? 'selected' : ''; ?>>Electronics</option>
                            <option value="Clothing" <?php echo ($product['procategory'] == 'Clothing') ? 'selected' : ''; ?>>Clothing</option>
                            <option value="Other" <?php echo ($product['procategory'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                    
                    <div class="mt-5 float-end">
                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" name="btn_update" class="btn btn-warning ms-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="javascript/index.js"></script>