<html>
    <body>
    <title>Test Page</title>
    <form method="get">
        <input type="text" name="input1" required>
        <input type="submit" value="Submit" />
    </form>
    <?php
        echo "Input1: " . $_GET['input1'];
    ?>
    </body>
</html>