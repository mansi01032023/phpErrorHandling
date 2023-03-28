<!-- die -->
<h2>1. die()</h2>
<?php
if (file_exists('test.txt')) {
    fopen('test.txt', 'r');
} else {
    // die("File not found");
}
?>
<!-- set_error_handler() -->
<h2>2. set_error_handler()</h2>
<?php
function errorHandler($errno, $errstr)
{
    echo "<b>Error:</b> [$errno] $errstr";
}
set_error_handler("errorHandler");

echo ($test);
?>
<!-- trigger_error() -->
<h2>3. trigger_error()</h2>
<form action="#" method="get">
    <input type="text" name="itext">
</form>
<?php
if (isset($_GET['itext'])) {
    $input = $_GET['itext'];
    if (!is_numeric($input) && isset($input)) {
        trigger_error("Enter a numeric value!");
    } else if (isset($input)) {
        echo "Successful";
    }
}
?>
<!-- user warning -->
<h2>4. E_USER_WARNING</h1>
    <form action="#" method="get">
        <input type="text" name="inputText">
    </form>
    <?php
    if (isset($_GET['inputText'])) {
        $input = $_GET['inputText'];
        function customError($errno, $errstr)
        {
            echo "<b>Error:</b> [$errno] $errstr";
        }
        set_error_handler("customError", E_USER_WARNING);
        if ($input > 1) {
            trigger_error("Value should be less than 1", E_USER_WARNING);
        } else {
            echo "Successful!";
        }
    }
    ?>
    <!-- user notice and user warning -->
    <h2>5. E_USER_NOTICE and E_USER_ERROR</h2>
    <?php
    if (file_exists("text.txt")) {
        trigger_error("File found.", E_USER_NOTICE);
    } else {
        trigger_error("File not found", E_USER_ERROR);
    }
    ?>
    <!-- custom error -->
    <h2>6. Custom Error</h1>
        <nav>Age
            <a href="menu">Linka</a>
            <a href="about">Linkb</a>
        </nav>
        <!-- error log -->
        <h2>7. error log</h2>
        <a href="./temp/errors">ErrorLog</a>
        <?php
        $age = -10;
        if ($age <= 0) {
            $error = "Age cannot be zero";
        }
        error_log($error . "\n", 3, "./temp/errors");
        ?>
        <!-- files -->
        <h2>8. Files</h1>
            <?php
            function files($errno, $errstr, $errfile, $errline)
            {
                echo "<b>Error:</b> [$errno] $errstr $errfile $errline <br>";
            }
            set_error_handler("files", E_USER_ERROR);
            if ($age <= 0) {
                trigger_error("files", E_USER_ERROR);
            }
            ?>
            <!-- error_get_last() -->
            <h2>9. error_get_last()</h2>
            <?php
            @$undef_var;
            echo ($xyz);
            $e = error_get_last();
            print_r($e);
            ?>
            <!-- database logs -->
            <h2>10. Database logs</h2>
            <form action="#" method="get">
                <input type="text" name="filename">
            </form>
            <?php
            if (isset($_GET['filename'])) {
                $filename = $_GET['filename'];
                $host = "mysql-server";
                $uname = "root";
                $pwd = "secret";
                $db = $filename;
                if (!mysqli_connect($host, $uname, $pwd, $db)) {
                    trigger_error("Cannot find database", E_USER_ERROR);
                } else {
                    trigger_error("Connection Successful", E_USER_NOTICE);
                }
            }
            ?>