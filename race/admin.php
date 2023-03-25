<html>

<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>office</title>
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
            <h1>Office</h1>
        </div>
        <div class="pbody">
            <form method="post" id="form">
                <div class="praido"><input name="radio" type="radio" value="New Office"><label for="New Office">New Office</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Offices"><label for="View Offices">View Offices</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Cars"><label for="View Cars">View Cars</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="Search Cars"><label for="Search Cars">Search Cars</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Car Reservations"><label for="View Car Reservations">View Car Reservations</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Customers"><label for="View Customers">View Customers</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="Search Customers"><label for="Search Customers">Search Customers</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Customer Reservations"><label for="View Customer Reservations">View Customer Reservations</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Reservations By Date"><label for="View Reservations By Date">View Reservations By Date</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Payments"><label for="View Payments">View Payments</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Car Status"><label for="View Car Status">View Car Status</label></div><br>

                <div class="pheading"><button type="submit" formaction="/race/login.php">back</button> <button type="submit" form="form" id='submit' name='submit'>submit</button></div>
            </form>


            <?php
            session_start();
            $office_id = $_SESSION['office_id'];
            if (isset($_POST['submit'])) {
                if (!empty($_POST['radio'])) {
                    switch ($_POST['radio']) {
                        case "New Office":
                            header('location:/final2/RegisterOffice.php');
                            break;
                        case "View Offices":
                            header('location:ViewOffice.php');
                            break;
                        case "View Cars":
                            header('location:ViewCarAdmin.php');
                            break;
                        case "Search Cars":
                            header('location:/final2/ViewCarsForm.php');
                            break;
                        case"View Car Reservations":
                            header('location:/final2/query2form.php');
                            break;
                        case "View Customers":
                            header('location:ViewCustomer.php');
                            break;
                        case "Search Customers":
                            header('location:/final2/ViewCustomersForm.php');
                            break;
                        case "View Customer Reservations":
                            header('location:/final2/query4form.php');
                            break;
                        case "View Reservations By Date":
                            header('location:/final2/query1form.php');
                            break;
                        case "View Payments":
                            header('location:/final2/query5form.php');
                            break;
                        case "View Car Status":
                            header('location:/final2/query3form.php');
                            break;
                    }
                    echo "hi";
                } else echo "<html><p class='errmssg'>You need to select an operation!!</p></html>";
            }
            ?>