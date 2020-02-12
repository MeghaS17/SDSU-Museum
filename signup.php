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

<!-- Function to add Total number of attendees -->

<script>
function calculate() {
  var a = document.getElementById('attendees1').value || 0;
  var b = document.getElementById('attendees2').value || 0;
  var c = document.getElementById('attendees3').value || 0;
  var d = document.getElementById('attendees4').value || 0;
  var result = document.getElementById('result');
  var myResult = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d);
  result.value = myResult;
}
</script>
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


<?php
 // define variables and set to empty values
 $firstname = $lastname = $address = $phone = "";
 $email = $event = $citizenscience = "";
 $hiddengems = $hikes = $family = $attendees = "";
 $attendees1 = $attendees2 = $attendees3 = "";
 $attendees4 = $newsletter1 = $newsletter2 = "";
 $other_events = "";
 $firstnameErr = $lastnameErr = $emailErr = $eventErr = $phoneErr = "";
 $addressErr = $other_eventsErr = $newsletterErr = "";
 $attendees1Err = $attendees2Err = $attendees3Err = $attendees4Err = "";

 function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    if (empty(filter_input(INPUT_POST, "firstname"))) {
               $valid = false;
			   $firstnameErr = "First name is required";
      }else {
               $_SESSION['firstname'] = test_input(filter_input(INPUT_POST, "firstname"));
               $firstname = test_input(filter_input(INPUT_POST, "firstname"));
     // check if Name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
           $valid = false;
      $firstnameErr = "Only letters and white space allowed"; 
    }
   }	
        
           if (empty(filter_input(INPUT_POST, "lastname"))) {
               $valid = false;
			   $lastnameErr = "Last name is required";
            }else {
               $_SESSION['lastname'] = test_input(filter_input(INPUT_POST, "lastname"));
			   $lastname = test_input(filter_input(INPUT_POST, "lastname"));
// check if Name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
           $valid = false;
      $lastnameErr = "Only letters and white space allowed"; 
    }
  }		
           if (empty(filter_input(INPUT_POST, "address"))) {
               $_SESSION['address'] = "";
            }else {
		$_SESSION['address'] = test_input(filter_input(INPUT_POST, "address"));
		$address = test_input(filter_input(INPUT_POST, "address"));
// check if address is valid
              if (!preg_match("/^[#.0-9a-zA-Z\s,-]+$/",$address)) {      
       $valid = false;
       $addressErr = "Postal address must be valid"; 
}
}

             if (empty(filter_input(INPUT_POST, "phone"))) {
                $_SESSION['phone'] = "";
            }else {
		$_SESSION['phone'] = test_input(filter_input(INPUT_POST, "phone"));
		$phone = test_input(filter_input(INPUT_POST, "phone"));

               // check if phone is only number with 10digit

			if (!preg_match("/^\d{10}+$/",$phone)) {
           $valid = false;
          $phoneErr = "Only numbers with 10 digits allowed"; 
      }
      }	
   
            if (empty(filter_input(INPUT_POST, "email"))) {
               $valid = false;
			   $emailErr = "Please enter Email id";
            }else {
               $_SESSION['email'] = test_input(filter_input(INPUT_POST, "email"));
			   $email = test_input(filter_input(INPUT_POST, "email"));
               
               // check if e-mail address is well-formed 
			if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
				$valid = false;
				$emailErr = "Invalid email address, please enter valid email id"; 
     }
     }

   if (empty(filter_input(INPUT_POST, "event"))) {
               $valid = false;
                           $eventErr= "Please select Event to Register";
            }else {
			 $_SESSION['event'] = test_input(filter_input(INPUT_POST, "event"));
			   $event= test_input(filter_input(INPUT_POST, "event"));
                       }

  if (empty(filter_input(INPUT_POST, "citizenscience"))) {
               $_SESSION['citizenscience'] = "";
            }else {
			 $_SESSION['citizenscience'] = test_input(filter_input(INPUT_POST, "citizenscience"));
			}

  if (empty(filter_input(INPUT_POST, "hiddengems"))) {
               $_SESSION['hiddengems'] = "";
            }else {
			$_SESSION['hiddengems'] = test_input(filter_input(INPUT_POST, "hiddengems"));
			}

  if (empty(filter_input(INPUT_POST, "hikes"))) {
               $_SESSION['hikes'] = "";
            }else {
			$_SESSION['hikes'] = test_input(filter_input(INPUT_POST, "hikes"));
			}

  if (empty(filter_input(INPUT_POST, "family"))) {
               $_SESSION['family'] = "";
            }else {
			$_SESSION['family'] = test_input(filter_input(INPUT_POST, "family"));
			}
               
 if (empty(filter_input(INPUT_POST, "attendees1"))) {
               $valid = false;
                           $attendees1Err = "Please enter Number of attendees";
            }else {
			 $_SESSION['attendees1'] = test_input(filter_input(INPUT_POST, "attendees1"));
			   $attendees1= test_input(filter_input(INPUT_POST, "attendees1"));

// check if Value is a number
           if (!preg_match('/^[0-9]*$/', $attendees1)) {
           $valid = false;
      echo $attendees1Err = "Value must a number"; 
}
}


 if (empty(filter_input(INPUT_POST, "attendees2"))) {
               $valid = false;
                           $attendees2Err = "Please enter Number of attendees";
            }else {
			 $_SESSION['attendees2'] = test_input(filter_input(INPUT_POST, "attendees2"));
			   $attendees2= test_input(filter_input(INPUT_POST, "attendees2"));

// check if Value is a number
                          if (!preg_match('/^[0-9]*$/', $attendees2)) {
           $valid = false;
      echo $attendees2Err = "Value must a number"; 
}
}
 if (empty(filter_input(INPUT_POST, "attendees3"))) {
               $valid = false;
                           $attendees3Err = "Please enter Number of attendees";
            }else {
			 $_SESSION['attendees3'] = test_input(filter_input(INPUT_POST, "attendees3"));
			   $attendees3= test_input(filter_input(INPUT_POST, "attendees3"));

// check if Value is a number
                          if (!preg_match('/^[0-9]*$/', $attendees3)) {
           $valid = false;
      echo $attendees3Err = "Value must a number"; 
}
}
if (empty(filter_input(INPUT_POST, "attendees4"))) {
               $valid = false;
                           $attendees4Err = "Please enter Number of attendees";
            }else {
			 $_SESSION['attendees4'] = test_input(filter_input(INPUT_POST, "attendees4"));
			   $attendees4= test_input(filter_input(INPUT_POST, "attendees4"));

// check if Value is a number
                          if (!preg_match('/^[0-9]*$/', $attendees4)) {
           $valid = false;
      echo $attendees4Err = "Value must a number"; 
}
}


  if (empty(filter_input(INPUT_POST, "newsletter1"))) {
               $_SESSION['newsletter1'] = "";
            }else {
			 $_SESSION['newsletter1'] = test_input(filter_input(INPUT_POST, "newsletter1"));
			}

  if (empty(filter_input(INPUT_POST, "newsletter2"))) {
               $_SESSION['newsletter2'] = "";
            }else {
			$_SESSION['newsletter2'] = test_input(filter_input(INPUT_POST, "newsletter2"));
			
$var="yes";

var_dump(filter_var($var, FILTER_VALIDATE_BOOLEAN));
}

if (empty(filter_input(INPUT_POST, "other_event"))) {
               $_SESSION['other_event'] = "";
			} else {
			$_SESSION['other_event'] = test_input(filter_input(INPUT_POST, "other_event"));
			$other_event = test_input(filter_input(INPUT_POST, "other_event"));

    // check if interest format is correct
			  if (!preg_match("/^[A-Za-z0-9\-\\,.]+$/",$other_events)) {
           $valid = false;
           echo $other_eventsErr = "Text field must be valid"; 
}
}
           $valid = true;
           header("location:welcome.php");
           exit();     
}
?>

<h2>Register for our upcoming SDSU Events</h2>
<p>Please fill this form to Register for Upcoming Events and click submit when finished <br> Items marked with an asterisk (*) are <strong> *Required Fields </strong></p>

<form action="welcome.php" method="post">
 <fieldset>
  <legend>Personal information:</legend>
     <label for="firstname">First name:<span class="required">*</span></label> <br>
     <input type="text" name="firstname" id="firstname" onchange="capitalize(this.value)" size="40"  maxlength="60" value="<?php echo $firstname; ?>" ><span class = "error"> <?php echo " " . $firstnameErr;?></span> <br>

    <label for="lastname">Last name<span class="required">*</span>:</label> <br>
    <input type="text" name="lastname" id="lastname" onchange="capitalize1(this.value)" size="40"  maxlength="60" value="<?php echo $lastname; ?>" ><span class = "error"><?php echo " " . $lastnameErr;?></span>
	<br>

    <label for="address">Address:</label> <br>
    <input type="text" name="address" id="address" size="120"  maxlength="100" value="<?php echo $address; ?>"><span class = "error"><?php echo " " . $addressErr;?></span>
	<br>

    <label for="phone">Phone:</label> <br>
    <input type="text" name="phone" id="phone" size="40"  maxlength="11" value="<?php echo $phone; ?>"><span class = "error"><?php echo " " . $phoneErr;?></span>
	<br>

    <label for="email">Email<span class="required">*</span>:</label> <br>
    <input type="email" name="email" id="email" size="80"  maxlength="255" value="<?php echo $email; ?>" ><span class = "error"><?php echo " " . $emailErr;?></span>
	<br>
</fieldset>

<fieldset>
  <legend>Interests:</legend>

     <label for="event">Select Event to Register:<span class="required">*</span> <span class="<?php echo $event; ?>"></span> <span class = "error"><?php echo " " . $eventErr;?></span></label> <br>
        <select name="event" id="event">
          <option value="">Please select event</option>
      	  <option value="citizenscience">Citizen Science</option>
	  <option value="hiddengems">Hidden Gems</option>
	  <option value="hikes">Nature Hike</option>
          <option value="family">Winter Wonders Family Day</option>
        </select> <br>

     <label>Please enter total number of attendees<span class="required">*</span>:</label>
     <input type="hidden" id="attendees" name="attendees" value="Please enter total number of attendees"> <br>

    <label for="attendees1">Number of attendees under 5 years old<span class="required">*</span>:</label> 
    <input type="text" name="attendees1" id="attendees1"  onchange="calculate()" size="1"  maxlength="1" value="<?php echo $attendees1; ?>" ><span class = "error"><?php echo " " . $attendees1Err;?></span>
	<br>
    <label for="attendees2">Number of attendees between 5 and 12 years old<span class="required">*</span>:</label> 
    <input type="text" name="attendees2" id="attendees2"  onchange="calculate()" size="1"  maxlength="1" value="<?php echo $attendees2; ?>" ><span class = "error"><?php echo " " . $attendees2Err;?></span>
	<br>

    <label for="attendees3">Number of attendees 13 to 17 years old<span class="required">*</span>:</label> 
    <input type="text" name="attendees3" id="attendees3"  onchange="calculate()" size="1"  maxlength="1" value="<?php echo $attendees3; ?>" ><span class = "error"><?php echo " " . $attendees3Err;?></span>
	<br>

    <label for="attendees4">Number of attendees 18+ years old<span class="required">*</span>:</label> 
    <input type="text" name="attendees4" id="attendees4"  onchange="calculate()" size="1"  maxlength="1" value="<?php echo $attendees4; ?>" ><span class = "error"><?php echo " " . $attendees4Err;?></span>
	<br>

    <label>Total number of attendees:</label>
    <input type="text" id="result" name="attendees" value="<?php echo $result; ?>" > <br>


    <label>Signup for newsletter:</label><br>

    <input type="checkbox" name="yes" id="newsletter1" value="yes" checked>Interested<br>
    <input type="checkbox" name="no" id="newsletter2" value="No">Not Interested<br>

    <label for="other_events">Lets us know what other types of Event interests you?:<span class = "error"><?php echo " " . $other_events;?></span>
</label><br>
     <textarea name="other_events" id="other_events" rows="6" cols="50"><?php echo $other_events; ?></textarea>
    
</fieldset>

    <input type="submit" value="Submit">
    <input type="reset" value="Clear All">

</form>
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

<!-- Function to display First name in ProperCase -->
<script>
function capitalize(str) {
  var arr = [];
  var arr2 = [];
  var strLower = "";
  var strLower2 = "";
  var i;
  arr = str.split(' ');

  for (i=0; i < arr.length; i++) {

    arr[i] = arr[i].toLowerCase();
    strLower = arr[i];
    arr2 = strLower.split('');
    arr2[0] = arr2[0].toUpperCase();
    strLower2 = arr2.join('');
    arr[i] = strLower2;
  }

  str = arr.join(' ');
document.getElementById("firstname").value = str;
}
</script>

<!--  Function to display last name in ProperCase -->
<script>
function capitalize1(str) { 
var arr = [];
  var arr2 = [];
  var strLower = "";
  var strLower2 = "";
  var i;
  arr = str.split(' ');

  for (i=0; i < arr.length; i++) {

    arr[i] = arr[i].toLowerCase();
    strLower = arr[i];
    arr2 = strLower.split('');
    arr2[0] = arr2[0].toUpperCase();
    strLower2 = arr2.join('');
    arr[i] = strLower2;
  }

  str = arr.join(' ');
document.getElementById("lastname").value = str;
}	
</script>


</body>
</html>
