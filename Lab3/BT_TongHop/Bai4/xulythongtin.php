<html>

<head>
    <title>Trang kết quả</title>
    <style>
        a:hover {
            color: #FF4500;
        }

        a {
            text-decoration: none;
        }

        a:active {
            color: #FFA500;
        }

        form {
            width: 750px;
            left: 50%;
            top: 25%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: #DCDCDC;
            padding-left: 30px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['name']))
        $name = trim($_POST['name']);
    if (isset($_POST['address']))
        $address = trim($_POST['address']);
    if (isset($_POST['phone']))
        $phone = trim($_POST['phone']);
    if (isset($_POST['sex']))
        $sex = trim($_POST['sex']);
    //Xử lý môn học
    $p_start = "";
    $p_end = "";
    if (isset($_POST['chk1']) && $_POST['chk1'] = 'php'){
        $chk1 = 'PHP & MySQL';
    }
    else $chk1 = '';
    if (isset($_POST['chk2']) && $_POST['chk2'] = 'cs'){
        //Xử lý dấu phẩy
        if(isset($_POST['chk1'])) $p_start = ", ";
        if(isset($_POST['chk3']) || isset($_POST['chk4'])) $p_end = ", ";
        $chk2 = $p_start . 'C#' . $p_end;
        $p2 = ', ';
    }
    else $chk2 = '';
    if (isset($_POST['chk3']) && $_POST['chk3'] = 'xml'){
        //Xử lý dấu phẩy
        $p_start = "";
        if(isset($_POST['chk4'])) 
            $p_end = ", ";
        else
            $p_end = "";
        if(isset($_POST['chk1']) && !isset($_POST['chk2'])) $p_start = ", ";
        $chk3 = $p_start . 'XML' . $p_end;
    }
    else $chk3 = '';
    if (isset($_POST['chk4']) && $_POST['chk4'] = 'py'){
        //Xử lý dấu phẩy
        $p_start = "";
        if(isset($_POST['chk1']) && !isset($_POST['chk3']) && !isset($_POST['chk2'])) 
            $p_start = ", ";
        $chk4 = $p_start . 'Python';
    }
    else $chk4 = '';
    //Xử lý quốc tịch
    if (isset($_POST['nationality'])) {
        $nationality = trim($_POST['nationality']);
        switch ($nationality) {
            case 'vietnam':
                $nationality = 'Việt Nam';
                break;
            case 'korea':
                $nationality = 'Hàn Quốc';
                break;
            case 'japan':
                $nationality = 'Nhật Bản';
                break;
        }
    }
    if (isset($_POST['note']))
        $note = trim($_POST['note']);

    ?>
    <form name="myform">
        <h2>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</h2>
        <table>
            <tr>
                <td>Họ tên:</td>
                <td><?php echo $name ?></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><?php echo $address ?></td>
            </tr>
            <tr>
                <td>Số điện thoại:</td>
                <td><?php echo $phone ?></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td><?php echo $sex ?></td>
            </tr>
            <tr>
                <td>Quốc tịch:</td>
                <td><?php echo $nationality ?></td>
            </tr>
            <tr>
                <td>Môn học:</td>
                <td><?php echo $chk1 . $chk2 . $chk3 . $chk4 ?></td>
            </tr>
            <tr>
                <td>Ghi chú:</td>
                <td><?php echo $note ?></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
            </tr>
        </table>
    </form>

</body>

</html>