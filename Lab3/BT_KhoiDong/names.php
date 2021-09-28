<html>

<head>
    <title>Input data</title>
</head>

<body>
    <form action="names.php" name="myform" method="post">
        <!-- Sticky form -->
        First Name: <input type="text" name="Name[]" size=20 value="<?php if (isset($_POST['Name'])) echo $_POST['Name'][0]; ?>" /><br>
        Last Name: <input type="text" name="Name[]" size=20 value="<?php if (isset($_POST['Name'])) echo $_POST['Name'][1]; ?>" /><br>
        Age: <input type="text" name="Name[]" size=20 value="<?php if (isset($_POST['Name'])) echo $_POST['Name'][2]; ?>" /><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['Name'])) {
        echo "Chào bạn " . $_POST['Name'][0] . " " . $_POST['Name'][1] . ", " . $_POST['Name'][2] . " tuổi";
    }
    ?>
</body>

</html>