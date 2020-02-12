<?php
session_start();
?>
<!DOCTYPE html>

<!--
Suryavanshi, Megha
RedID 823443511
CS545_00 Cynthia Chie
Assignment #3
Fall 2018
-->

<html lang='en'>

<head>
	<title>SDSU Natural History Museum</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<header>
   <img src="images/logo.jpg" alt="SDSU NHM Logo">
   <h1>San Diego State University <br> Natural History Museum</h1>
</header>
    <nav>
      <ul>
         <li><a href="index.html">Home</a></li>
         <li><a href="about.html">About Us</a></li>
         <li><a href="exhibits.html">Exhibits</a></li>
         <li><a href="events.html">Events</a></li>
         <li><a href="science.html">Science & Research</a></li>
         <li><a href="join.html">Join & Support</a></li>
         <li><a href="contact.html">Contact Us</a></li>
      </ul>
     </nav>

<section class="flex-container">
<div class="column2_1">

<h2>Thank You for Registering to our upcoming SDSU event</h2>
<p>Please check the details you have entered for Event Registration</p>
<?php
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  $address = $_SESSION['address'];
  $phone = $_SESSION['phone'];
  $email = $_SESSION['email'];
  $event = $_SESSION['event'];
  $attendees1 =  $_SESSION['attendees1'];
  $attendees2 =  $_SESSION['attendees2'];
  $attendees3 =  $_SESSION['attendees3'];
  $attendees4 =  $_SESSION['attendees4'];
  $newsletter1 =  $_SESSION['newsletter1'];
  $newsletter2 =  $_SESSION['newsletter2'];
  $other_events = $_SESSION['other_events'];
?>
<?php
  $firstname = trim(filter_input(INPUT_POST, 'firstname'));
  $lastname = trim(filter_input(INPUT_POST, 'lastname'));
  $address = trim(filter_input(INPUT_POST, 'address'));
  $phone = trim(filter_input(INPUT_POST, 'phone'));
  $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
  $event = trim(filter_input(INPUT_POST, 'event'));
  $attendees1 =  trim(filter_input(INPUT_POST, 'attendees1'));
  $attendees2 = trim(filter_input(INPUT_POST, 'attendees2'));
  $attendees3 =  trim(filter_input(INPUT_POST, 'attendees3'));
  $attendees4 =  trim(filter_input(INPUT_POST, 'attendees4'));
  $newsletter1 =  trim(filter_input(INPUT_POST, 'newsletter1'));
  $newsletter2 =  trim(filter_input(INPUT_POST, 'newsletter2'));
  $other_events = trim(filter_input(INPUT_POST, 'other_events'));
?>

<?php 
echo "Name: " . $firstname . " " . $lastname;
echo "<br>";
if ($address != null 
       and trim($address) != "") {
	echo "Address: " . $address	; 
}
else {
    echo "Address: Not Mentioned<br>";
}
if ($phone != null) {
	echo "Phone: " . $phone . "<br>";
}
else {
echo "Phone: Not Mentioned<br>";
}
echo "Email: " . $email; 
echo "<br>";
echo "Event: " . $event; 
echo "<br>";
echo "Total number of attendees: " . $attendees; 
if (isset($_POST['attendees1']) && isset($_POST['attendees2']) && isset($_POST['attendees3']) && isset($_POST['attendees4'])) {
 
    $attendees1 = $_POST['attendees1'];
    $attendees2 = $_POST['attendees2'];
    $attendees3 = $_POST['attendees3'];
    $attendees4 = $_POST['attendees4'];

    $sum = $attendees1 + $attendees2 + $attendees3 + $attendees4;
    echo $attendees1 . " + " . $attendees2 . " + " .$attendees3 . " + " . $attendees4. " = " . $sum;
}
echo "<br>";
if ($newsletter1 = null and $newsletter2 = null) {
    echo "Signup for Newsletter: Interested";
}
elseif ($newsletter1 != null and $newsletter2 = null) {
    echo "Signup for Newsletter: Not Specified";
}
elseif ($newsletter1 = null and $newsletter2 = null) {
    echo "Signup for Newsletter: Not Interested";
}
else {
      echo "Signup for Newsletter: Not Specified";
}
echo "<br>";

if ($other_events != null
	and trim($other_events) != "") {
	echo "Additional Event Interests: " . $other_events; 
}
?>

</div>
	
<div class="column2_2">

<h2>Support the Museum</h2>

<p>At the San Diego State University Museum of Natural History we strive to fulfill our mission to interpret the natural world through research, education and exhibits; to promote understanding of the evolution and diversity of southern California and the peninsula of Baja California; to train and grow our future leaders in research and conservation; and to inspire in all a respect for nature and the environment. We depend on people like you to help us realize this mission. </p>

<h2> Get Involved in the following ways.</h2>

<ul class="list">
    <li><a class="button" href="join.html">Become a Member</a></li>
    <li><a class="button" href="donate.html">Donate</a></li>
    <li><a class="button" href="volunteer.html">Volunteer</a></li>
    <li><a class="button" href="contact.html">Hours & Admission</a></li>
</ul>
</div>
</section>

<footer>
<address>
Contact Us:<br>
San Diego State University<br>
Natural History Museum<br>
San Diego, CA 92182-0000<br>619.594.5200<br>
<a href="#">nhmuseum@sdsu.edu</a>
</address>

<p>This page was last updated on:
<script src ="nhm.js"></script>
</p>

</footer>
</body>
</html>
