<html>
    <head>
        <title>Reservation</title>
    <body>
        <style>
 body{
     background-color: lightblue;
     text-align: center;
    }
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 text{
    padding: 3px;
    border: 3px solid gray;
    font-size:15px;
    text-align:center;
    margin: 0;
 }
 h1{
  color:darkgreen;
  font-size:25px;
  text-align:center;
 }
 img {
  display: block;
  margin-left: auto;
  margin-right: auto;
 }
 input[type=button], input[type=submit], input[type=reset] {
  background-color: darkgreen;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
/*button {
  background-color: black;
  color: white;
  padding: 15px;
  text-align: center;
  display: inline-block;
  font-size: 15px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
}*/

 </style>

<script>
    function show(){
        document.getElementById("content").style.display="block";
        document.getElementById("button_form").style.display="none";
        document.getElementById("button_form").disabled=true;
    }
    
    
</script>


<?php
$plate_id=$_GET["plate_id"];
session_start();
$connection=mysqli_connect('localhost','root','');
#echo $connection ? 'connected' : 'not connected';
mysqli_select_db($connection,"car_rental_system");
$customer_id=$_SESSION['customer_id'];
$get_name = "SELECT c.fname,c.lname
FROM customer as c where c.customer_id=$customer_id";
$resultN = mysqli_query($connection,$get_name);
$name= mysqli_fetch_assoc($resultN);
echo "<div><h1>$name[fname] $name[lname]</h1>
<h1>  SELECTED CAR DETAILS  </h1>
</div>";


$sql = "SELECT c.model,c.year,c.color,c.price_per_day,c.plate_id,o.e_mail,o.location
FROM car as c join office as o on c.office_id=o.office_id where c.plate_id=$plate_id";
$result = mysqli_query($connection,$sql);
$answer= mysqli_fetch_assoc($result);

echo"
 <div style='padding:20px;'>
<p>Model          : $answer[model]<br>
Year Model     : $answer[year]<br>
Color          : $answer[color]<br>
Price Per Day  : $answer[price_per_day]<br>
Plate Id       : $answer[plate_id]<br>
Office Email   : $answer[e_mail]<br>
Office Location: $answer[location]<br></p><br>
</div> ";

  #header('location:WelcomeOffice.php');
  if(isset($_POST['submit'])){
    
    $date1=$_POST['datefield'];
    $date2=$_POST['datefield2'];
    $_SESSION['date1']=$date1;
    $_SESSION['date2']=$date2;
    $date_start=strtotime($date1);
    $date_end=strtotime($date2);
    #echo $_POST['datefield'];
    $No_days=($date_end-$date_start)/60/60/24;
    #header('location:WelcomeOffice.php');
    if($No_days<0){
        echo '<script type="text/javascript">alert("Make Sure the end of reservation date is after the start of reservation date");</script>';
    }
    else{
        $sql1="UPDATE car SET stats='rented' where plate_id=$plate_id";
        $result1 = mysqli_query($connection,$sql1);
        #echo'ahmed';
        $sql_aux="SELECT price_per_day FROM car where plate_id=$plate_id";
        $result_aux = mysqli_query($connection,$sql_aux);
        $res=mysqli_fetch_row($result_aux);
        #echo $res[0];
        #echo $res[0]*$No_days;
        $total_price=$res[0]*$No_days;
        $sql2="INSERT into rent (customer_id,plate_id,start_date,end_date,price) values ($customer_id,$plate_id,'$date1','$date2',$res[0]*$No_days)";
        mysqli_query($connection,$sql2);
        echo"  
        <div style='padding:20px; text-align: center;' id ='content'>
        <h3>RESERVED SUCCESSFULLY</h3>
        <p>
        Reservation period from  $date1 to $date2<br>
        Car        : $answer[model] - $answer[year]<br>
        Price Per Day  : $answer[price_per_day]<br>
        Number of days of reservations       : $No_days<br>
        Total Price in $(no additional charging)          : ($total_price)$<br>
        For any  question email the office   : $answer[e_mail]<br>
        Pickup Location: $answer[location]<br></p><br>
        <form action='' method='POST'  >
        <button class='button' type='submit' name='submit2' id='button_form2' >
            Make Payment
        </button>
        </form>
        </div> 
        ";
        
    }
    
  }if(isset($_POST['submit2'])){
    $pay_date=date("Y-m-d");
    $date1=$_SESSION['date1'];
    $date2=$_SESSION['date2'];
    #echo $pay_date;
    $sql4="UPDATE rent SET payment_date='$pay_date' where plate_id=$plate_id and customer_id=$customer_id and start_date='$date1' and end_date='$date2'";
    $result4 = mysqli_query($connection,$sql4);
    echo '<script type="text/javascript">alert("Payment Done Successfully");</script>';
    header('location:WelcomeUser.php');
}
?>

<form  action="" method="POST" id="date_form">
<div id='show'>
<label style="font-size:20px;">Select the start date for your reservation:</label>
<input id="datefield" name="datefield" type="date" min="" max="" required></input><br>
<label style="font-size:20px;">Select the end date for your reservation:</label>
<input id="datefield2" name="datefield2" type="date" min="" max="" required></input><br>
</div>
<button disabled type="submit" name="submit" id="button_form"  onclick="show()">
 Click here to complete your reservation
</button>

</form>
<form action="ViewUserCar.php">
    <input type="submit" value="Back" />
</form>
<form action="WelcomeUser.php">
    <input type="submit" value="Back to my options" />
</form>

<script>
    document.getElementById("button_form").disabled=false;
    var date = new Date();
    var year =date.getFullYear();
    var maxYear=year+1;
    var month = date.getMonth()+1;
    var todayDate=String(date.getDate()).padStart(2,'0');
    var datePattern = year+ '-'+month+'-'+todayDate;
    var datePatternEnd = maxYear+ '-'+month+'-'+todayDate;
    document.getElementById("datefield").min=datePattern;
    document.getElementById("datefield2").min=datePattern;
    document.getElementById("datefield").max=datePatternEnd;
    document.getElementById("datefield2").max=datePatternEnd;
    
</script>


    </body></head>
</html>