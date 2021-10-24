<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Xóa</title>
</head>

<body>
    <?php
    include('includes/header.php');
    if(!isset($_SESSION['username']))
        echo("<script>location.href = 'index.php';</script>");
    require('connect.php');

    if ( (isset($_GET['maNV'])) ) { // From nhanvien.php
        $maNV = $_GET['maNV'];
    } elseif ( (isset($_POST['maNV'])) && (is_numeric($_POST['maNV'])) ) { // Form submission.
        $maNV = $_POST['maNV'];
    } else { // No valid ID, kill the script.
        echo '<p class="error">This page has been accessed in error.</p>';
        include ('includes/footer.html'); 
        exit();
    }
    //Lấy dữ liệu nhân viên theo mã NV
    $query_nv = "SELECT hoTen FROM `nhanvien` WHERE maNV='$maNV';";
    $result_nv = @mysqli_query($dbc, $query_nv);
    $hoTen = '';
    if (mysqli_num_rows($result_nv) == 1) {
        $row = mysqli_fetch_array ($result_nv);
        $hoTen = $row['hoTen'];
    } else { // Not a valid user ID.
        echo '<h4 class="error text-center mt-2">This page has been accessed in error.</h4>';
    }
    mysqli_free_result($result_nv);

    ?>
    <form action="" method="post" class="p-3">
        <table bgcolor="#f5f5f0" align="center" width="60%" border="0" class="mx-auto rounded shadow">
            <tr bgcolor="#ffd633">
                <td colspan="3" align="center">
                    <font color="#001a00">
                        <h2>XÓA NHÂN VIÊN</h2>
                    </font>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <font color="#001a00">
                        <h3 class="text-danger">Bạn có chắc chắn muốn xóa nhân viên:
                             <?php echo "<br>Tên: $hoTen - Mã NV: $maNV" ?></h3>
                    </font>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <div class="form-check form-check-inline">
                        <input type="radio" name="sure" value="Yes" class="form-check-input" id=y/>
                        <label class="form-check-label mt-1 mb-2 text-dark" for="y">Có</label> 
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="sure" value="No" checked="checked" class="form-check-input" id="n"/>
                        <label class="form-check-label mt-1 mb-2 text-dark" for="n">Không</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input type="submit" name="xoa" size="10" value="&nbsp&nbsp Xóa &nbsp&nbsp" class="btn btn-danger my-2 shadow" />
                    <a href="javascript:window.history.back(-1);" class="btn btn-secondary shadow">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['xoa'])){
            if ($_POST['sure'] == 'Yes') { // Delete the record.
    
                // Make the query:
                $q = "DELETE FROM nhanvien WHERE maNV='$maNV' LIMIT 1";		
                $r = @mysqli_query ($dbc, $q);
                if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
                    // header("Location: nhanvien.php");
                    
                    // Print a message:
                    echo '<h1 class="text-center text-danger">Nhân viên này đã được xóa</h1>';	
                    echo '<a href="nhanvien.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto shadow">
                            Quay lại trang nhân viên</button></a>';
        
                } else { // If the query did not run OK.
                    echo '<h3 class="error text-center">The employee could not be deleted due to a system error.</h3>'; // Public message.
                    echo '<p class="text-center">' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
                    echo '<a href="nhanvien.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto shadow">
                            Quay lại trang nhân viên</button></a>';
                }
            
            } else { // No confirmation of deletion.
                echo '<h1 class="text-center text-danger">Nhân viên này chưa được xóa!.</h1>';	
                echo '<a href="nhanvien.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto shadow">
                            Quay lại trang nhân viên</button></a>';
            }
        }
        
    
    }
    mysqli_close($dbc);
    include('includes/footer.html');
    ?>
    
    
</body>

</html>