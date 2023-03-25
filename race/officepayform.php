<!DOCTYPE html>
<html>
<?php 
         session_start();
         $office_id=$_SESSION['office_id'];
?>
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
            <h1>Office Payments</h1></h1>
        </div>
        <div class="pbody">
    <form action="officepayview.php"  method="POST" id="form" >
    <div class="pelement"><text>Start date:</text><input type="date" class="startdate" name="startdate" ></div><br>
    <div class="pelement"><text>End date:</text><input type="date" class="enddate" name="enddate" ></div><br>
    <div class="pheading">
                    <button class="back" type="submit" formaction="office.php">back</button>
                    <button class="back" form="form" type='submit' id="submit" name='submit'>View</button></div> <br>
</form>

</body>        
</html>