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

        Our server/website is not fully developed yet, however there are many aspects that ARE developed and this 
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

Mobile Application
	There is no unit testing for the mobile app yet as just the GUI's have been constructed. There is not-
	hing to test.

