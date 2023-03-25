<!DOCTYPE html>
<html>

<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>login</title>
</head>

<body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
    <div class="panel">
        <div class="pheading">
            <h1>Log in</h1>
        </div>
        <div class="pbody">
            <form method="post">
                <div class="pelement"><text>Email:</text> <input type='text' name='email'></div><br>
                <div class="pelement"><text>Password:</text> <input type='password' name='pwd'></div><br>
                <div class="pheading"><input type='submit' id="submit" name='submit' value='Log in'></div>
                <div class="pheading">
                    <p> New to RACE? <a href="signup.php">create account</a></p>
                </div>
                <br><br>
            </form>
        </div>
    </div>
    <?php
    session_start();
    if (isset($_POST['submit'])) {
        $connection = mysqli_connect('localhost', 'root', '');
        echo $connection ? '' : 'not connected';
        mysqli_select_db($connection, "car_rental_system");
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        if ($email == '') {
            echo ('<html><p class="errmssg">Missing E-mail!!</p></html>');
        } elseif ($pwd == '') {
            echo '<html><p class="errmssg">Missing password!!</p></html>';
        } else {
            $query = mysqli_query($connection, "select * from admin where e_mail='" . $email . "' and pass='" . $pwd . "'");
            $res = mysqli_fetch_row($query);
            if ($res) {
                header('location:admin.php');
            } else {
                $query = mysqli_query($connection, "select * from office where e_mail='" . $email . "' and pass='" . $pwd . "'");
                $res = mysqli_fetch_row($query);
                if ($res) {
                    $office_id = $res[0];
                    $_SESSION['office_id'] = $office_id;
                    header('location:office.php');
                } else {
                    $query = mysqli_query($connection, "select * from customer where e_mail='" . $email . "' and pass='" . $pwd . "'");
                    $res = mysqli_fetch_row($query);
                    if ($res) {
                        $customer_id = $res[0];
                        $_SESSION['customer_id'] = $customer_id;
                        header('location:user.php');
                    } else {
                        echo '<html><p class="errmssg">Invalid Email or Password</p></html>';
                    }
                }
            }
        }
    }
    ?>
</body>

</html>