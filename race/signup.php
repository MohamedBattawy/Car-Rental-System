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
            <h1>Sign up</h1>
        </div>
        <div class="pbody">
            <form method="post" id="form">
                <div class="pelement"> First Name:<input type='text' name='fname'></div><br>
                <div class="pelement">Last Name:<input type='text' name='lname'></div><br>
                <div class="pelement"> Email:<input type='text' name='email'></div><br>
                <div class="pelement">Password:<input type='password' name='pwd'></div><br>
                <div class="pelement"> Confirm Password:<input type='password' name='confirmpwd'></div><br>
                <div class="pheading">
                    <button class="back" type="submit" formaction="login.php">back</button>
                    <button class="back" form="form" type='submit' id="submit" name='submit'>Sign up</button></div> <br>
            </form>
            <br><br>
        </div>
    </div>


    

    <?php
    session_start();
    if (isset($_POST['submit'])) {
        $connection = mysqli_connect('localhost', 'root', '');
        echo $connection ? '' : 'not connected';
        mysqli_select_db($connection, "car_rental_system");
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];
        $confirmpwd = $_POST['confirmpwd'];
        if ($fname == '' || $lname == '') {
            echo '<html><p class="errmssg">Name is missing!!</p></html>';
        } elseif ($email == '') {
            echo ' <html><p class="errmssg">E-mail is missing!!</p></html>';
        } elseif ($pwd == '') {
            echo '<html><p class="errmssg">Password is missing!!</p></html>';
        } elseif ($pwd != $confirmpwd) {
            echo '<html><p class="errmssg">Passwords do not match!!</p></html>';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo ' <html><p class="errmssg">Invalid E-mail Format!!</p></html>';
        } else {
            $select = mysqli_query($connection, "SELECT * FROM customer WHERE e_mail = '" . $_POST['email'] . "'");
            if (mysqli_num_rows($select)) {
                exit('<html><p class="errmssg">There is an account using this E-mail!!</p></html>');
            }
            //$t=time();
            $email = $_POST['email'];
            $inserting = "INSERT INTO customer (e_mail,fname,lname,pass) VALUES ('$email','$fname','$lname','$pwd')";
            if ($connection->query($inserting) === TRUE) {
                header('location:login.php');
            }
        }
    }
    ?>
</body>
</html>