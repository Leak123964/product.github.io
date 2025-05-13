
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_product_crud"; // Assuming your database for products is named this
$con = new mysqli($servername, $username, $password, $database);
date_default_timezone_set('Asia/Phnom_Penh');
function moveImage($image)
{
    $product = date('y_m_d_h_i_s') . '_' . $_FILES[$image]['name'];
    $path = './image/' . $product;
    move_uploaded_file($_FILES[$image]['tmp_name'], $path);
    return $product;
}
function add_product()
{
    global $con;
    if (isset($_POST['btnsave'])) {
        $pro_img = moveImage('img_product');
        $pro_name = $_POST['name_product'];
        $pro_price = $_POST['price_product'];
        $pro_category = $_POST['category_product'];
        if (!empty($pro_name) && !empty($pro_price) && !empty($pro_category)) {
            $sql_insert = "INSERT INTO `tb_crud_product`(`proimage`, `proname`, `procategory`, `proprice`)
                            VALUES ('$pro_img','$pro_name','$pro_category','$pro_price')";
            $result = $con->query($sql_insert);
            if ($result) {
                echo '
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Save product successfully!",
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
                </script>
                ';
            }
        }
    }
}
add_product();

function showproduct()
{
    global $con;
    $sql_select = "SELECT * FROM `tb_crud_product`";
    $result = $con->query($sql_select);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <tr>
            <td>' . $row['proid'] . '</td>
            <td>
                <img style="width: 80px; height: 80px; object-fit: contain;" src="./image/' . $row['proimage'] . '" alt="' . ($row['proname']) . '">
            </td>
            <td>' . $row['proname'] . '</td>
            <td>' . $row['proprice'] . '</td>
            <td>' . $row['procategory'] . '</td>
            <td>' . $row['date'] . '</td>
            <td class="text-center">
                <div class="d-flex justify-content-center">
                    <a href="updateproduct.php?id=' . $row['proid'] . '" class="btn btn-sm btn-warning me-2">
                        <span>Update</span>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteId(' . $row['proid'] . ')">
                        <span>Delete</span>
                    </button>
                </div>
            </td>
        </tr>
        ';
    }
}
function updateproduct()
{

    global $con;
    if (isset($_POST['btn_update'])) {
        $pro_id = $_POST['id'];
        $pro_img =  $_FILES['img_product']['name'];
        $pro_name = $_POST['name_product'];
        $pro_price = $_POST['price_product'];
        $pro_category = $_POST['category_product'];
        if (empty($pro_img)) {
            $pro_img = $_POST['old_image'];
        } else {
            $pro_img  = moveImage('img_product');
        }
        if (!empty($pro_name) && !empty($pro_price) && !empty($pro_category)) {
            $sql = "UPDATE `tb_crud_product` 
                    SET `proimage`='$pro_img',
                        `proname`='$pro_name',
                        `procategory`='$pro_category',
                        `proprice`='$pro_price'
                    WHERE `proid`='$pro_id'";
            $rs = $con->query($sql);
            if ($rs) {
                echo '<script>
                    $(document).ready(function() {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Updated successfully!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "Error updating product",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                </script>';
            }
        }
    }
}
updateproduct();
function deleteProduct() {
    global $con;
    if (isset($_POST['btn_delete_confirm'])) {
        $deleteid = $_POST['delete_id'];
        $sql_delete = "DELETE FROM tb_crud_product WHERE proid = $deleteid";
        $rs_del = $con->query($sql_delete);
        if ($rs_del) {
            echo '<script>
                Swal.fire({
                    title: "Success!",
                    text: "Product deleted successfully",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            </script>';
        } else {
            echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Failed to delete Product",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            </script>';
        }
    }
}
deleteProduct();