<html>

<head>
    <title>Trang nhập liệu</title>
    <style>
        #title {
            color: #cc0099;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        #kq {
            background-color: #ffb3ff;
            font-weight: bold;
        }

        form {
            border: 2px solid #2F4F4F;
            border-radius: 20px;
            width: 460px;
            background-color: #80bfff;
            left: 50%;
            top: 15%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        table {
            margin-left: 10px;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        body {
            background-color: #F8F8FF;
        }
        td{
            font-weight: bold;
            font-size: 20px;
        }
        #_chon {
            color: #DC143C;
        }
    </style>
</head>

<body>
    <form action="ketquapheptinh.php" name="myform" method="post">
        <table>
            <tr>
                <th colspan="2" id="title">
                    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
                </th>
            </tr>
            <tr>
                <td id="_chon">Chọn phép tính:</td>
                <td>
                <input type="radio" name="radPT" value="Cộng" checked /> Cộng
                <input type="radio" name="radPT" value="Trừ" /> Trừ
                <input type="radio" name="radPT" value="Nhân" /> Nhân
                <input type="radio" name="radPT" value="Chia" /> Chia
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td>
                    <input type="text" name="txtMot" size=35 required />
                </td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td>
                    <input type="text" name="txtHai" size=35 required />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Tính</button>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>