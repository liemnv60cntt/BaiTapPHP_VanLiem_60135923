<!DOCTYPE html>
<html>
<head>
    <title>Bài 3</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }

        tr:nth-child(even) {
        background-color: rgba(150, 212, 212, 0.4);
        }

        th:nth-child(even),td:nth-child(even) {
        background-color: rgba(150, 212, 212, 0.4);
        }
        td{
            padding-left: 60px;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Bảng cửu chương từ 1 đến 10</h1>
    <table style="width:100%">
        <tr>
            <?php
                for($i = 1; $i <= 10; $i++)
                    echo "<th>Bảng $i</th>"; 
            ?>
        </tr>
        <tr>
        <?php
            for($i = 1; $i <= 10; $i++) {
                echo "<td>";
                for($j = 1; $j <= 10; $j++) {
                    echo "$i x $j = " . ($i * $j);
                    echo "<br>";
                }
                echo "</td>";
            }
        ?>
        </tr>
    </table>

</body>
</html>