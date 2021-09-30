<html>

<head>
    <title>Trang nhập liệu</title>
    <style>
        form {
            width: 500px;
            left: 50%;
            top: 25%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: #DCDCDC;
        }

        fieldset {
            border: 2px solid #4B0082;
        }

        #title {
            color: #4B0082;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form action="xulythongtin.php" name="myform" method="post">
        <fieldset>
            <legend id="title">Enter your information</legend>
            <table>
                <tr>
                    <td>Họ tên:</td>
                    <td>
                        <input type="text" name="name" size=40 required />
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td>
                        <input type="text" name="address" size=40 required />
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td>
                        <input type="text" name="phone" size=40 required />
                    </td>
                </tr>
                <tr>
                    <td>Giới tính :</td>
                    <td>
                        <input type="radio" name="sex" value="Nam" checked /> Nam
                        <input type="radio" name="sex" value="Nữ" /> Nữ
                    </td>
                </tr>
                <tr>
                    <td>Quốc tịch:</td>
                    <td>
                        <select name="nationality">
                            <option value="vietnam" selected>
                                Việt Nam
                            </option>
                            <option value="korea">
                                Hàn Quốc
                            </option>
                            <option value="japan">
                                Nhật Bản
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Các môn đã học:</td>
                    <td>
                        <input type="checkbox" name="chk1" value="php" />PHP & MySQL
                        <input type="checkbox" name="chk2" value="cs" />C#
                        <input type="checkbox" name="chk3" value="xml" />XML
                        <input type="checkbox" name="chk4" value="py" />Python
                    </td>
                </tr>
                <tr>
                    <td>Ghi chú:</td>
                    <td>
                    <textarea name="note" rows="5" cols="40"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit">Gửi</button>&nbsp;
                        <button type="reset">Hủy</button>
                    </td>
                </tr>
            </table>
        </fieldset>

    </form>

</body>

</html>