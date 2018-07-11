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


Mobile Application
There is no integration testing for the mobile app yet as just the GUI's have been constructed. There is not-
hing to test.
  
  

    
 
    
  
  
