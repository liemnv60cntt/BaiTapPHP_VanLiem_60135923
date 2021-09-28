<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 800px;
            margin: auto;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            font-weight: bold;
            font-size: 20px;
            width: 400px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        ._g8 {
            color: red;
            text-align: center;
        }

        ._g {
            text-align: center;
        }
        h1{
            text-align: center;
        }
    </style>
</head>

<body>
    <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
    <h1>
        Xổ số kiến thiết tỉnh Khánh Hòa ngày
        <?php   
            echo date('d-m-Y');
        ?>
    </h1>

    <table>

        <tr>
            <td style="width: 400px;">Giải 8</td>
            <td class="_g8" colspan="4">
                <?php
                $g8 = rand(0, 9) . rand(0, 9);
                echo "<div> $g8 </div>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải 7</td>
            <td class="_g" colspan="4">
                <?php
                $g7 = rand(0, 9) . rand(0, 9) . rand(0, 9);
                echo "<div> $g7 </div>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải 6</td>
            <?php
            for ($i = 0; $i < 3; $i++) {
                $g6 = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                if($i==1)
                    echo "<td class='_g' colspan='2'> $g6 </td>";
                else
                    echo "<td class='_g'> $g6 </td>";
            }

            ?>
        </tr>
        <tr>
            <td>Giải 5</td>
            <td class="_g" colspan="4">
                <?php
                $g5 = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                echo "<div> $g5 </div>";
                ?>
            </td>
        </tr>
        <tr>
            <td rowspan="2">Giải 4</td>

            <?php
                for ($i = 0; $i < 4; $i++) {
                    $g4 = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                    echo "<td class='_g'> $g4 </td>";
                }
            ?>
        </tr>
        <tr style="background-color: white;">
            <?php
                for ($i = 0; $i < 3; $i++) {
                    $g4 = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                    if($i==1)
                        echo "<td class='_g' colspan='2'> $g4 </td>";
                    else
                        echo "<td class='_g'> $g4 </td>";
                }
            ?>
        </tr>
        <tr></tr>
        <tr>
            <td>Giải 3</td>
            <?php
                for ($i = 0; $i < 2; $i++) {
                    $g3 = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                    echo "<td class='_g' colspan='2'> $g3 </td>";
                }
            ?>
        </tr>
        <tr>
            <td>Giải 2</td>
            <td class="_g" colspan="4">
                <?php
                $g2 = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                echo "<div> $g2 </div>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải 1</td>
            <td class="_g" colspan="4">
                <?php
                $g1 = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                echo "<div> $g1 </div>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải đặc biệt</td>
            <td class="_g8" colspan="4">
                <?php
                $gdb = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                echo "<div> $gdb </div>";
                ?>
            </td>
        </tr>
    </table>

</body>

</html>