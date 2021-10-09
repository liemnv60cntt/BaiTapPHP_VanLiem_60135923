<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài 3</title>
    <link rel="stylesheet" type="text/css" href="./style_bai3.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script> -->

</head>

<body>
    <?php
    require("xuly.php");
    ?>
    <h1>
        Xổ số kiến thiết tỉnh Khánh Hòa ngày
        <?php
        echo date('d-m-Y');
        ?>
    </h1>


    <form action="" name="myform" method="POST">
        <table>
            <tr>
                <td style="width: 400px;">Giải 8</td>
                <td class="_g8" colspan="4">
                    <input type="text" name="g8" value="<?php echo $g8 ?>" class="inp_giai _g8" readonly />
                </td>
            </tr>
            <tr>
                <td>Giải 7</td>
                <td class="_g" colspan="4">
                    <input type="text" name="g7" value="<?php echo $g7 ?>" class="inp_giai" readonly />
                </td>
            </tr>
            <tr>
                <td>Giải 6</td>
                <?php
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 1) {
                        echo "<td class='_g' colspan='2'>" . 
                        "<input type='text' name='g6_$i' value='$g6[$i]' class='inp_giai' readonly />"
                         . "</td>";
                    } else {
                        echo "<td class='_g'>" .
                         "<input type='text' name='g6_$i' value='$g6[$i]' class='inp_giai' readonly />" 
                         . "</td>";
                    }
                }

                ?>
            </tr>
            <tr>
                <td>Giải 5</td>
                <td class="_g" colspan="4">
                <input type="text" name="g5" value="<?php echo $g5 ?>" class="inp_giai" readonly />
                </td>
            </tr>
            <tr>
                <td rowspan="2">Giải 4</td>

                <?php
                for ($i = 0; $i < 4; $i++) {

                    echo "<td class='_g'>" .
                    "<input type='text' name='g4_$i' value='$g4[$i]' class='inp_giai' readonly />" 
                     . "</td>";
                }
                ?>
            </tr>
            <tr style="background-color: white;">
                <?php
                for ($i = 4; $i < 7; $i++) {
                    if ($i == 5)
                        echo "<td class='_g' colspan='2'>" . 
                        "<input type='text' name='g4_$i' value='$g4[$i]' class='inp_giai' readonly />"  
                        . "</td>";
                    else
                        echo "<td class='_g'>" .
                        "<input type='text' name='g4_$i' value='$g4[$i]' class='inp_giai' readonly />" 
                         . "</td>";
                }
                ?>
            </tr>
            <tr></tr>
            <tr>
                <td>Giải 3</td>
                <?php
                for ($i = 0; $i < 2; $i++) {

                    echo "<td class='_g' colspan='2'>" . 
                        "<input type='text' name='g3_$i' value='$g3[$i]' class='inp_giai' readonly />" 
                    . "</td>";
                }
                ?>
            </tr>
            <tr>
                <td>Giải 2</td>
                <td class="_g" colspan="4">
                    <input type="text" name="g2" value="<?php echo $g2 ?>" class="inp_giai" readonly />
                </td>
            </tr>
            <tr>
                <td>Giải 1</td>
                <td class="_g" colspan="4">
                    <input type="text" name="g1" value="<?php echo $g1 ?>" class="inp_giai" readonly />
                </td>
            </tr>
            <tr>
                <td>Giải đặc biệt</td>
                <td class="_g8" colspan="4">
                    <input type="text" name="gdb" value="<?php echo $gdb ?>" class="inp_giai_db _g8" readonly />
                </td>
            </tr>
        </table>
        <div id="find">
            <table id="tb2">
                <tr>
                    <th colspan="2"><h2>Tìm giải theo vé số nhập vào</h2></th>
                </tr>
                <tr>
                    <td class="t1">Nhập vé số:</td>
                    <td>
                        <input type="text" name="veSo" id="veSo" size=30 value="<?php echo $veSo ?>" required class="inp" pattern="[0-9]{6}" /><br>
                        (Nhập đúng 6 chữ số) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" name="tim" class="btn">Tìm giải <i class='fas fa-search'></i></button><br>
                        <!-- <input type="submit" name="tim" value="Tìm giải" class="btn" /> -->
                    </td>
                </tr>
                <tr>
                    <td class="t1">Trúng giải:</td>
                    <td><?php 
                        foreach($ketqua as $v){
                            echo $v . " ";
                        }
                    ?></td>
                </tr>
            </table>
        </div>

    </form>

</body>

</html>