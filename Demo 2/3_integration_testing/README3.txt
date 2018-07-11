Integration Testing

Arduino and ESP8266-12E
    All integration tests were done by combining code for different features, uploading to the appropriate board and
  testing each function manually without reuploading code. Manual tests were done by clicking buttons on a local web
  server, checking the output on the hardware and checking the output on the serial monitor where print statements were
  inserted. The Piezo buzzer portion of code was checked by bringing a magnet next to the Hall Effect sensor and observing
  whether or not the buzzer turned on or off. In addition to the output of circuit components, the connection between the
  Arduino and the ESP8266-12E was checked by using the on/off button for the regular LED on the local web server to see
  if the connection had actually been established. All of the hardware output was checked with the output to the serial
  monitor to confirm that the outputs agreed.

Because all interaction in our system only occurs through the GUI, integration testing was done manually rather than by script.

*********************************************************************
Server & Database Integration Testing
Module 1 sign up

Test:Successfully created user accounts
  Affects:database
  New entry is made to members to indicate a new user
  
  Instructions for testing the database:
    Input username, email address along with the password in the sign up tab.
    Logon to phpmyadmin with the username 'root' and password 'sqlpass'.
    Under the database you are able to access members.
    Clicking it will show the database with the newly created user along with the information pertaining to the user.
    
    User Entry:'test1','test1@testing.com','testing1234','testing1234'
    Database:INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`,         `loggedin`) VALUES (NULL, 'test1', '$2y$10$n1l/YTVZ86orP.KYkcuOjeQQb3VBVb6zR3b5eewVjgk85MjZ4iUqK', 'test1@testing.com',       'yes', NULL, 'No', 0x01)
    
Test: Attempt to make account with taken username
	
	Affects: Registration page
	-Error message given
  
  Input username, email address along with the password in the sign up tab with the same credentials used once before.
  Error:username already taken
  
*********************************************************************
Module 2 login in

Input the username "test1" and the password "testing1234"

receiver a socket
client send: {"action":"login","pwd":"testing1234","name":"test1"}
action: login

*********************************************************************
Test: Successfully create user account
	
	Affects: Database
	-New entry is added to memebers to indicate new user being added

Test: Attempt to make account with taken username
	
	Affects: Registration page
	-Error message given

Test: Login as valid user

	Affects: Website homepage
	-access to privaleged web pages is granted

Test: Login as invalid user
	
	Affects: website homepage
	-Error message returned


*********************************************************************
Module 3 - Remote Device Commands & Device Status

This was manually tested as this was associated with our code that was concerned
with the Arduino, as well as the server itself. The server side code was written,
and once it would succesfully parse, we would upload the code to the server and
then manually test our code to see if our requests were being sent to and executed 
by the Arduino. We did this for all of the commands that you could send, including 
lights "turn on", "turn off", "red", "green", "blue", as well as buzzers "enable"
and "disable". After we were able to succesfully send remote commands, we performed
additional tests to ensure that the system was updating the device status and that 
it was properly displaying to the user as well. 

Integration Testing
Android Mobile Application

**********************************************************************
Module 1
Sign Up

Test: Create a user account
Affects: Database
	-Error with connecting to database
	-No bugs were found in the code but the information would not update to the database
Instructions for testing: 
	Input username, email, and password
	Login to phpmyadmin with username "root" and password "sqlpass"
	Check the "members" page under database
	See if the new user is visible in the members page.

**********************************************************************
Module 2
Login

Test: Login to access main page
Affects: Database
	-Error with connecting to database
	-unable to move on to the home screen without database connection
Instructions for testing: 
	input username and password
	click login
	if home screen shows with all light/lock settings then user has successfully been logged in

*********************************************************************
Module 3
Main Screen

Test: Lights and Door Lock are accessible via mobile app
Affects: Database and Arduino
	-Unable to test effectively because database connection hasn't been established
Instructions for testing: 
	-After login enter main screen
	-Test lights by clicking on, off, red, green, or black
	-Check arduino to see that commands from application are shown in the led attached to arduino
	-Test door lock by clicking lock or unlock
	-When in lock mode, move sensor apart and listen for a noise
	-When in unlock mode, no noise should sound when sensor is moved apart

  

    
 
    
  
  
