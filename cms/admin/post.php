<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="phone">
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST['name']);
    echo "</pre>";
    
}
?>
</body>
</html>

