Unit Tests

Arduino
    For each Arduino component, unit tests are performed by applying input from the website and checking output on the serial monitor.
  Hardware components are also tested individually to check their functionality. Since the Arduino runs the code in the loop() method
  continuously, code is checked before loops, during loops, after loops, before and after reading hardware input and when checking
  important functions. These checks are performed by uncommenting the included print statements and checking the serial monitor when print
  statements are expected to print. This requires additional input from the hardware in the case of the buzzer.

ESP8266-12E
    After uploading the code, the connection is tested by print statements. If the device is powered ON and there are no print statements to 
  the serial monitor, then the device has not been connected. If there are print statements, then the device should be connected and 
  clicking buttons on the local webpage should trigger events that are visible on the hardware. If nothing happens after clicking the 
  buttons on the webpage, then it is likely that there is a problem with the server. Check all connections and refer to the server section 
  if problems persist.

Server End - PHP + MySQL

    Our server/website is now fully developed, this 
    is meant to help show that these different aspects are in fact working. Since most of our application is 
    developed for the backend (server side scripting), it may be difficult to write code to specifically test 
    different features. Hence for this reason, we decided we would test our code MANUALLY by testing a variety of 
    inputs and observing whether or not the quereys are posted to the database, and observing whether or not the
    website outputted error messages to the user. The unit tests are as follows;

Duplicate Username
        The user is creating a new account, and registers a username that is already stored in the database. The user 
    should be unable to create this account and a error should be outputted to them because there is a duplicate 
    usermame, however, upon clicking on the 'register' button, the page does nothing. Going to myphpadmin reveals 
    that no querey was entered into the database so our PHP code works, but we were unable to output an error mess-
    age to the user. 

Valid E-Mail Address
        The user is creating a new account, and registers with an email address that doesnt contain a valid '@_.com'
    handle. Upon detection of this, the server should output a message advising that the email address is invalid,
    and should not accept the database querey. This is in fact the case and works perfectly. 

Confirm Password
        The user is creating a new account, and during registration mixes up her password and types it incorrectly the
    second time. The user shouldnt be able to make this account. The server should not accept this database querey
    and should output to the user an error message explaining why it didnt work. Our server does in fact not accept
    the database querey, but it is still unable to output an error message to the user. 

Light: Turn On
	The user is now logged in and decides he wants to turn on his light. He clicks on the "lights" tab
	and then clicks "turn on", the light should turn on and output a message saying that it turned on

Light: Turn Off
	The user is now logged in and decides he wants to turn off his light. He clicks on the "lights" tab
	and then clicks "turn off", the light should turn off and output a message saying that it turned off

Light: Red
	The user is now logged in and decides he wants to turn his light to red. He clicks on the "lights" tab
	and then clicks "red", the light should turn red and output a message saying that it turned red

Light: Green
	The user is now logged in and decides he wants to turn his light to green He clicks on the "lights" tab
	and then clicks "green", the light should turn green and output a message saying that it turned green

Light: Blue
	The user is now logged in and decides he wants to turn his light to blue. He clicks on the "lights" tab
	and then clicks "blue", the light should turn blue and output a message saying that it turned blue 

Buzzer: Enable
	The user is now logged in and decides he wants to enable his security alarm system. He clicks on "buzzer"
	tab and clicks on "Enable", the security system is now turned on and will buzz when the door is opened. 
	The system should tell the user that the request was executed succesfully. 

Buzzer: Disable
	The user is now logged in and decides he wants to disable his security alarm system. He clicks on "buzzer"
	tab and clicks on "Disable", the security system is now turned off and will not buzz when the door is opened. 
	The system should tell the user that the request was executed succesfully. 

Account Settings : Reset Password
	The user is now logged in and decides he wants to change his password. He goes to the "account settings"
	tab and sees a field for his new password. There he types his new password, confirms it, and clicks on
	a button that says "Change password". Once this is clicked, the password should be succesfully changed
	and the system should tell the user it was successfully changed. 

Mobile Application
	For the application, we completed testing first to see if all the buttons worked correctly and the 
layout was locked in place with all the constraints that we used with each button. After this, we tested the 
connection between the mobile application and the database by running the application on an emulator. The 
user was able to successfully input the username and password, however a connection to the server was not 
able to be established. The screen would say “logging in…” and would not be able to move on until this 
connection was established. We tried creating different servers, however we were not able to figure out 
what was going wrong with the jSON requests that we were using, thus we were not able to successfully 
connect the application to the server & database.


