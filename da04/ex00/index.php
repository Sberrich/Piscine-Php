<?php
    session_start();
    if ($_GET['login'] !== "" && $_GET['passwd'] !== "" && $_GET['submit'] === "OK")
    {
        $user = $_SESSION['username'] =  $_GET['login'];
        $password = $_SESSION['password'] = $_GET['passwd'];
    }
    else if ($_SESSION['username'] !== "" && $_SESSION['password'] !== "")
    {
        $user = $_SESSION['username'];
        $password = $_SESSION['password'];
    }
    else
    {
        $user = '';
        $password = '';
    }
?>
<!DOCTYPE html>
<head></head>
<body>
    <form action="index.php" method="get">
    Username: <input type="text" name="login" value="<?php echo $user;?>"><br>
    Password: <input type="password" name="passwd" value="<?php echo $password;?>"><br>
        <input type="submit" name="submit" value="OK">
    </form>
</body></html>
