<html>

<head>
    <title>Input/Ouput data</title>
</head>

<body>
    <form action="textarea.php" name="myform" method="post">
        Your comment:
        <br>
        <!-- Sticky form -->
        <textarea name="comment" rows="5" cols="50"><?php if (isset($_POST['comment'])) echo $_POST['comment']; ?></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_POST["comment"]))
        print "Your comment: " . $_POST["comment"];
    ?>
</body>

</html>