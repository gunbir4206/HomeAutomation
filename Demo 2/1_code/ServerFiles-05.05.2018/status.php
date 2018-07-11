<?php require('includes/config.php');

      $servername="localhost";
      $username="root";
      $password="";
      $dbname="database";

      $link = new mysqli($servername, $username, $password, $dbname);

      session_regenerate_id (true);
   	
      $_SESSION['username']=$username;

      if (isset($_POST["lightstatus"])){
      $lightstatus=$_POST["lightstatus"];
    }
      if (isset($_POST["buzzerstatus"])){
      $buzzerstatus=$_POST["buzzerstatus"];
    }
      if (isset($_POST["doorstatus"])){ 
      $doorstatus=$_POST["doorstatus"];
    }
      if (isset($_POST["rgbstatus"])){
      $rgbstatus=$_POST["rgbstatus"];
    }

      function checkuserlight($username)
        {
         if($link)
         {
           $result = mysql_query("SELECT * FROM lightLog WHERE username='$username' LIMIT 1");
            if(mysql_fetch_array($result) !== false)
              {
                return 1;
              }
            elseif (mysql_fetch_array($result) == false)
              {
                return 0;
              }
          }
   }

      function checkuserRGB($username){
      if($link){
         $result = mysqli_query("SELECT * FROM lightLog WHERE username='$username' LIMIT 1");
         if(mysqli_fetch_array($result) !== false)
         {
            return 1;
         }
         elseif (mysqli_fetch_array($result) == false)
         {
            return 0;
         }
      }
   }

      function checkuserbuzzer($username){
      if($link){
         $result = mysqli_query("SELECT * FROM buzzerLog WHERE username='$username' LIMIT 1");
         if(mysqli_fetch_array($result) !== false)
         {
            return 1;
         }
         elseif (mysqli_fetch_array($result)==false)
         {
            return 0;
         }
      }
   }

    if(isset($_POST['lightstatus']))
    {
        updateLightStatus();
    }
    elseif(isset($_POST['buzzerstatus']))
    {
        updateBuzzerStatus();
    }
    elseif(isset($_POST['doorstatus']))
    {
         updateBuzzerStatus();
    }
    elseif(isset($_POST['rgbstatus']))
    {
        updateRGBStatus();
    }

function updateLightStatus(){
  $status='it worked!';
$filename = "test.txt";
$fp = fopen($filename, 'w');
if (!$fp)
{
    echo '<p><strong>Cannot generate message file</strong></p></body></html>';
    exit;
} 

$outputstring  = $status;

fclose($fp);

      if (checkuserlight($username)>0)
      {
      $query = "UPDATE lightLog SET lightstatus='".$lightstatus."' WHERE username='$username'";
      file_put_contents($filename, $outputstring);

      }
      else
      {
	   $query = "INSERT INTO `lightLog` ('username',`lightstatus`) VALUES ('".$username."','".$lightstatus."')"; 
      }
   	
   mysqli_query($link,$query);
	 mysqli_close($link);
}

function updateBuzzerStatus(){

      if (checkuserbuzzer($username)>0)
      {
      $query = "UPDATE buzzerLog SET buzzerstatus='".$buzzerstatus."' WHERE username='$username'";
      }
      else
      {
      $query = "INSERT INTO `buzzerLog` ('username',`buzzerstatus`) VALUES ('".$username."','".$buzzerstatus."')"; 
      }
      
   mysqli_query($link,$query);
   mysqli_close($link);
   }

   function updateRGBStatus(){
      if ($rgbstatus="(1023,000,000)")
      {
         $color="Red";
      }
      elseif ($rgbstatus="(000,1023,000)")
      {
         $color="Green";
      }
      elseif ($rgbstatus="(000,000,1023)")
      {
         $color="Blue";
      }

      if (checkuserRGB($username)>0)
      {
      $query = "UPDATE lightLog SET RGBstatus='".$color."' WHERE username='$username'";
      }
      else
      {
      $query = "INSERT INTO `lightLog` ('username',`RGBstatus`) VALUES ('".$username."','".$color."')"; 
      }
    
   mysqli_query($link,$query);
   mysqli_close($link);
   }
?>