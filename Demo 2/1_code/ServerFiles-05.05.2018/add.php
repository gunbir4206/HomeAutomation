<?php
   	include("connect.php");

      $servername="localhost";
      $username="root";
      $password="sqlpass";
      $dbname="database";

      $link = new mysqli($servername, $username, $password, $dbname);
   	
      $username=$_SESSION['username'];

      $lightstatus=$_POST["lightstatus"];
      $buzzerstatus=$_POST["buzzerstatus"];
      $doorstatus=$_POST["doorstatus"];
      $rgbstatus=$_POST["rgbstatus"];



       if(array_key_exists('lightstatus',$_POST))
    {
        updateLightStatus();
    }
    elseif(array_key_exists('buzzerstatus',$_POST))
    {
        updateBuzzerStatus();
    }
    elseif(array_key_exists('doorstatus',$_POST)){
         updateBuzzerStatus();
    }
    elseif(array_key_exists('rgbstatus',$_POST))
    {
        updateRGBStatus();
    }


function updateLightStatus{

      function checkuserlight($username){
      if($connection){
         $result = mysql_query("SELECT * FROM lightLog WHERE username='$username' LIMIT 1");
         if(mysql_fetch_array($result) !== false)
         {
            return 1;
         }
         else
         {
            return 0;
         }
      }
   }


      if (checkuserlight($username)=1)
      {
      $query = "UPDATE lightLog SET lightstatus='".$lightstatus."' WHERE username='$username'";
      }
      else
      {
	   $query = "INSERT INTO `lightLog` ('username',`lightstatus`) VALUES ('".$username."','".$lightstatus."')"; 
      }


   	
   mysql_query($query,$link);
	mysql_close($link);
   }

function updateBuzzerStatus{

      function checkuserbuzzer($username){
      if($connection){
         $result = mysql_query("SELECT * FROM buzzerLog WHERE username='$username' LIMIT 1");
         if(mysql_fetch_array($result) !== false)
         {
            return 1;
         }
         else
         {
            return 0;
         }
      }
   }


      if (checkuserbuzzer($username)=1)
      {
      $query = "UPDATE buzzerLog SET buzzerstatus='".$buzzerstatus."' WHERE username='$username'";
      }
      else
      {
      $query = "INSERT INTO `buzzerLog` ('username',`buzzerstatus`) VALUES ('".$username."','".$buzzerstatus."')"; 
      }


      
   mysql_query($query,$link);
   mysql_close($link);
   }

   function updateRGBStatus{
      if ($rgbstatus="(1023,000,000)"){
         $color="Red";
      }
      elseif ($rgbstatus="(000,1023,000)"){
         $color="Green";
      }
      elseif ($rgbstatus="(000,000,1023)"){
         $color="Blue";
      }

      function checkuserRGB($username){
      if($connection){
         $result = mysql_query("SELECT * FROM lightLog WHERE username='$username' LIMIT 1");
         if(mysql_fetch_array($result) !== false)
         {
            return 1;
         }
         else
         {
            return 0;
         }
      }
   }


      if (checkuserRGB($username)=1)
      {
      $query = "UPDATE lightLog SET RGBstatus='".$color."' WHERE username='$username'";
      }
      else
      {
      $query = "INSERT INTO `lightLog` ('username',`RGBstatus`) VALUES ('".$username."','".$color."')"; 
      }


      
   mysql_query($query,$link);
   mysql_close($link);
   }
?>
