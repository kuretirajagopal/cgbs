 <html>
<style>
body{
 background-image: url("book.jpg");background-repeat: no-repeat;background-position:
center;background-size: cover;
 }</style>
<?php
 include 'session.php' ?>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="table.css" media="screen" type="text/css" />
 </head>
 <body >
 <nav>
 <a href="logout.php">logout</a>
 <a href="check_availabilty.php">book new slot</a>
 <a href="cancel.php"> cancel slot</a>
 </nav>
 <?php
 $con=mysqli_connect("localhost","root","","ground");
if(!$con)
{
die('Could not Connect My Sql:' .mysql_error());
}
else{
$email=$_SESSION["email"];
$q="SELECT name from user_info where email='$email'";
$row=mysqli_query($con,$q);
while($ro = mysqli_fetch_assoc($row))
{
echo '<h1 style="float:left">'; echo "HI , ";echo strtoupper($ro["name"]);echo '</h1>';}
$query="SELECT * FROM book where email='$email'";
$result=mysqli_query($con,$query);
if (mysqli_num_rows($result) > 0)
 {
 // output data of each row
 echo'<br>';echo '<br>';echo '<br>';echo '<br>';
 echo '<h1 > MY UPCOMING SLOTS</h1>'; echo '<br>';
 echo '<table id="customers">';
 echo '<th> booking id</th>';
 echo '<th> email</th>';
 echo '<th> slot_date</th>';
 echo '<th> status</th>';
echo '<th> payment</th>';
 while($row = mysqli_fetch_assoc($result))
 { echo '<tr>';
 echo '<td>';echo $row["bid"];echo '</td>';
 echo '<td>';echo $row["email"];echo '</td>';
echo '<td>';echo $row["slot_date"];echo '</td>';
 echo '<td>';echo $row["status"];echo '</td>';
 echo '<td>';echo $row["payment"];echo '</td>';
 echo '</tr>';
 } echo '</table>';
 }
 else{
echo '<h1 id="f"> you didnot book any slot</h1>';
} }
 ?>
 <br><br>
<h1><mark>NOTE:BOOKING ID IS MANDATORY FOR PAYMENT AND FOR
CANCELLATION</mark></h1>
 </div>
 </body>
 </html> 
