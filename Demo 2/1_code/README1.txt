Arduino Code
    Note that the file "Arduino_integration.ino" is the file containing the final code. This file encompasses the code that controls the LED
  lights, the RGB LEDs and the Piezo buzzer that uses a Hall Effect sensor. The Arduino code can simply be uploaded as a sketch to an Arduino
  to be run repeatedly. As of now, this code enables the user to turn an LED bulb on or off, start and stop a RGB loop for the RGB LED and to
  enable the buzzer that turns on or off depending on the presence or absence of a magnet near the Hall Effect sensor. The Arduino must be
  used in conjunction with an ESP8266-12E WiFi module. The ESP8266-12E WiFi module must also have its own code uploaded and running for the
  output to work properly.
    Should the user wish to enable the buzzer and Hall Effect sensor alone, he or she may upload the file "ArduinoHallEffect.ino" to the
  Arduino. The same may be done with "RGB_LED.ino" if the user would like to use the RGB LEDs alone. However, there is no apparent need to do
  this, as any of these outputs could be tested individually with "Arduino_integration.ino" by using buttons on the local server.
    The hardware connections for the RGB LED are as follows:
        1. Connect the RED cathode to pin 3
        2. Connect the GREEN cathode to pin 5
        3. Connect the BLUE cathode to pin 6
        4. Connect the anode to 5V from the Arduino
    The hardware connections for the Piezo buzzer are as follows:
        1. Connect one side to the negative rail (GND)
        2. Connect the opposite side to pin 13 of the Arduino
    The hardware connections for the Hall Effect Sensor are as follows (refer to halleffect_sensor.png for pin numbers):
        1. Connect pin 1 to +5V
        2. Connect pin 2 to Ground
        3. Connect pin 3 to Arduino pin 3
        4. Connect pins 1 and 3 together with a 10kOhm resistor
    The hardware connections for the Arduino are as follows:
        1. Connect 5V to the positive rail of the breadboard
        2. Connect GND to the negative rail of the breadboard
        3. Connect digital pin 3 to the RED cathode of the RGB LED
        4. Connect digital pin 5 to the GREEN cathode of the RGB LED
        5. Connect digital pin 6 to the BLUE cathode of the RGB LED
        6. Connect digital pin 7 to GPIO 14 (pin D5) of the ESP8266-12E
  
ESP8266-12E Code
    The ESP8266-12E code can also be uploaded as a sketch from the Arduino IDE. To use this code properly, replace the string value of ssid 
  with the user's network SSID and replace the string value of password with the network's corresponding password. To check if the device 
  connected successfully, open the Serial Monitor in the Arduino IDE. The output on the Serial Monitor should be "Connected to [ssid]\nIP 
  address: [local IP address]" where the items in brackets are replaced by the user's choice of SSID and the actual local IP address, 
  respectively, and there is a new line where '\n' is placed. Note that for the output to be visible on the hardware, the anode of the single 
  color LED must be connected to GPIO 13 of the ESP8266-12E. GPIO 14 of the ESP8266-12E must be connected to pin 7 of the Arduino, as this is 
  the input that determines if the LED code is to run or not.


Server/website
	The website needs to be placed onto a server that supports PHP and MySQL database. In order to test 
the code, you must create a database called 'database', and within there make a table called 'members'. The
rows in the table include 'member id', 'username', 'password', 'email', and 'active'. All the server files 
must be copied to the root folder in your server. Once your server is up and running, you can go to your
web browser and type in "localhost/index.php", and this will bring you to our login site. 

Mobile Application
	The mobile application is not functional yet, only the GUI's have been constructed so far. 


