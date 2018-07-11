<?php require('includes/config.php'); 

$servername="localhost";
      $username="root";
      $password="sqlpass";
      $dbname="database";

if(array_key_exists('pass_reset',$_POST)){{

$stmt = $db->prepare('SELECT resetToken, resetComplete FROM members WHERE resetToken = :token');
$stmt->execute(array(':token' => $resetToken));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

}}

//if no token from db then kill the page
if(empty($row['resetToken'])){
  $stop = 'Invalid token provided, please use the link provided in the reset email.';
} elseif($row['resetComplete'] == 'Yes') {
  $stop = 'Your password has already been changed!';
}

//if form has been submitted process it
if(isset($_POST['submit'])){

  if (!isset($_POST['password']) || !isset($_POST['passwordConfirm']))
    $error[] = 'Both Password fields are required to be entered';

  //basic validation
  if(strlen($_POST['password']) < 3){
    $error[] = 'Password is too short.';
  }

  if(strlen($_POST['passwordConfirm']) < 3){
    $error[] = 'Confirm password is too short.';
  }

  if($_POST['password'] != $_POST['passwordConfirm']){
    $error[] = 'Passwords do not match.';
  }
  if(isset($error)){
    echo $error;
  }
  //if no errors have been created carry on
  if(!isset($error)){

    //hash the password
    $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {

      $stmt = $db->prepare("UPDATE members SET password = :hashedpassword, resetComplete = 'Yes'  ");
      $stmt->execute(array(
        ':hashedpassword' => $hashedpassword
              ));
      echo 'Success!';
      header("Refresh:0");
      echo 'Success!';

      exit;
            echo 'Success!';


    //else catch the exception and show the error.
    } catch(PDOException $e) {
        $error[] = $e->getMessage();
    }

  }

}
//define page title
$title = 'Reset Account';

//get input and redirect to corresponding function



    if(array_key_exists('lights_on',$_POST))
    {
        updateLightOn();
    }
    elseif(array_key_exists('lights_off',$_POST))
    {
        updateLightOff();
        updateRGBOff();
    }
    elseif(array_key_exists('color_red',$_POST))
    {
        updateColorRed();
    }
    elseif(array_key_exists('color_green',$_POST))
    {
        updateColorGreen();
    }
    elseif(array_key_exists('color_blue',$_POST))
    {
        updateColorBlue();
    }
    elseif(array_key_exists('buzzer_on',$_POST))
    {
        updateBuzzerOn();
    }
    elseif(array_key_exists('buzzer_off',$_POST)){
        updateBuzzerOff();
    }

//functions to update text files for Arduino

function updateLightOn()
  {
    $status=1;
$filename = "lights.txt";
$fp = fopen($filename, 'w');
if (!$fp)
{
    echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
} 

$file="lightoutput.txt";
$fp1=fopen($file,'w');
$output='On';
file_put_contents($file, $output);

$outputstring  = $status;

file_put_contents($filename, $outputstring);

echo "Light Turned On!";

fclose($fp);
fclose($fp1);

  }

function updateLightOff()
  {
    $status=0;
$filename = "lights.txt";
$fp = fopen($filename, 'w');
if (!$fp)
{
    echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
} 

$outputstring  = $status;

file_put_contents($filename, $outputstring);

$file="lightoutput.txt";
$fp1=fopen($file,'w');
$output='Off';
file_put_contents($file, $output);


echo "Light Turned Off!";

fclose($fp);
fclose($fp1);

  }
function updateRGBOff ()
  {
$color="0000 0000 0000\\n";
$filename = "rgb.txt";
$fp = fopen($filename, 'w');
if (!$fp)
    {
    echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
    } 

$file="lightoutput.txt";
$fp1=fopen($file,'w');
$output='Off';
file_put_contents($file, $output);

$outputstring  = $color;

file_put_contents($filename, $outputstring);

fclose($fp);
fclose($fp1);


  }


function updateColorRed ()
  {
$color="1023 0000 0000\\n";
$filename = "rgb.txt";
$fp = fopen($filename, 'w');
if (!$fp)
    {
    echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
    } 

$outputstring  = $color;

file_put_contents($filename, $outputstring);

echo "Color changed to Red!";

$file="rgboutput.txt";
$fp1=fopen($file,'w');
$output='Red';
file_put_contents($file, $output);

fclose($fp1);
fclose($fp);

  }

  function updateColorGreen ()
  {
$color="0000 1023 0000\\n";
$filename = "rgb.txt";
$fp = fopen($filename, 'w');
if (!$fp)
    {
    echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
    } 

$outputstring  = $color;

file_put_contents($filename, $outputstring);

echo "Color changed to Green!";
fclose($fp);

$file="rgboutput.txt";
$fp1=fopen($file,'w');
$output='Green';
file_put_contents($file, $output);

fclose($fp1);

  }
function updateColorBlue ()
  {
$color="0000 0000 1023\\n";
$filename = "rgb.txt";
$fp = fopen($filename, 'w');
if (!$fp)
    {
    echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
    } 

$outputstring  = $color;

file_put_contents($filename, $outputstring);

echo "Color changed to Blue!";
fclose($fp);

$file="rgboutput.txt";
$fp1=fopen($file,'w');
$output='Blue';
file_put_contents($file, $output);

fclose($fp1);

  }

function updateBuzzerOn()
{
  $buzz=1;
$filename = "buzzer.txt";
$fp = fopen($filename, 'w');
if (!$fp)
  {
     echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
  } 

$outputstring  = $buzz;

file_put_contents($filename, $outputstring);

echo "Buzzer alert turned on!";

fclose($fp);

$file="buzzeroutput.txt";
$fp1=fopen($file,'w');
$output='On';
file_put_contents($file, $output);

fclose($fp1);

}

function updateBuzzerOff()
{
  $buzz=0;
$filename = "buzzer.txt";
$fp = fopen($filename, 'w');
if (!$fp)
  {
     echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
  } 


$outputstring  = $buzz;

file_put_contents($filename, $outputstring);

echo "Buzzer alert turned off!";

fclose($fp);

$file="buzzeroutput.txt";
$fp1=fopen($file,'w');
$output='Off';
file_put_contents($file, $output);

fclose($fp1);

}


//include header template
require('layout/header.php'); 
?>

<html>

<style>

	body {
    max-width: 100%;
    height: 70vh;
    overflow: hidden;
	}

	body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}


/* Style the buttons that are used to open the tab content */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
} 
.tabcontent {
    animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
} 



</style>
<script>
	function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
} 

  $('.button').click(function() {

 $.ajax({
  type: "POST",
  url: "iframe.php",
  data: { name: "John" }
}).done(function( msg ) {
  alert( "Data Saved: " + msg );
});    

    });

	</script>

<body>
<!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Lights')">Lights</button>
  <button class="tablinks" onclick="openCity(event, 'Door')">Buzzer</button>
  <button class="tablinks" float = "right" onclick="openCity(event, 'Account')">Account Settings</button>
</div>

<!-- Tab content -->
<div id="Lights" class="tabcontent">
    <? php $lightfile="lights.txt";
        $fp=fopen($lightfile,'r');
        $rgbfile="rgboutput.txt";
        $fp1=fopen($lightfile,'r');
    ?>
    <h3>Light Status</h3>
    <p>Your light is currently: <?php echo file_get_contents( "lightoutput.txt" );?> </p> <p> And the color is: <?php echo file_get_contents( "rgboutput.txt" );?>


  <h3> </h3>
  <h3>Light Actions</h3>
  <h5>Change Color</h5>
  <p> </p>


 <form method="post">
  <input type="submit" class="button" name="color_red" id="color_red" value="Red" /><br/>
  <input type="submit" class="button" name="color_green" id="color_green" value="Green" /><br/>
  <input type="submit" class="button" name="color_blue" id="color_blue" value="Blue" /><br/>
</form>

  <p> </p>
  <h5>Turn on/off</h5>
  <p> </p>

  <form method="post">
    <input type="submit" class="button" name="lights_on" id="lights_on" value="Turn On" /><br/>
    <input type="submit" class="button" name="lights_off" id="lights_off" value="Turn Off" /><br/>
  </form>
  <p> </p>
</div>

<div id="Door" class="tabcontent">
  
  <h3>Buzzer Status</h3>
  <?php $buzzerfile="buzzeroutput.txt";
        $fp2=fopen($buzzerfile,'r');
        ?>

  <p>Your buzzer alert is currently: <?php echo file_get_contents( "buzzeroutput.txt" ); // get the contents, and echo it out. ?>
  <h3>Buzzer Actions </h3> 
  <p>Choose to enable security alert feature below</p>
  <form method="post">
    <input type="submit" class="button" name="buzzer_on" id="buzzer_on" value="Enable" /><br/>
    <input type="submit" class="button" name="buzzer_off" id="buzzer_off" value="Disable" /><br/>
  </form>
  
</div>

<div id="Account" class="tabcontent" float="right">
 <h3>Account Info</h3>
 <p>Your username is:</p> <p align="right"> <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?> </p>

        <form role="form" method="post" action="" autocomplete="off" align="left" name="pass_reset" id="pass_reset">
          <h3 align="left">Change Password</h3>

          <?php
          //check for any errors
          if(isset($error)){
            foreach($error as $error){
              echo '<p class="bg-danger">'.$error.'</p>';
            }
          }
          
          ?>

          <div class="row" align="left">
            <div class="col-xs-6 col-sm-6 col-md-6" align="left">
              <div class="form-group" align="left">
                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="1">
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6" align="left">
              <div class="form-group" align="left">
                <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="1">
              </div>
            </div>
          </div>
          
          <div class="row" align="left">
            <div class="col-xs-6 col-md-6" align="left">
              <input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-block btn-lg" tabindex="3">
            </div>
          </div>
        </form>
 
</div>

</body>
</html>
