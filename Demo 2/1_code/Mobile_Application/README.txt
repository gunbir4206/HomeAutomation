This file contains the file names of all files in this repository, descriptions of the contents of each file and instructions
on how to run AutoHome.

Demo 1
	1_code
		Mobile_Application


		Server


		ino_files
			Please remember to connect all hardware prior to testing the code.

			The code in this folder can be compiled and built in the Arduino IDE. Simply download the Arduino IDE and the code here, then open the file you
			want to upload or test, then click Upload. Ensure that the device you want to upload the code to is connected, the correct port is selected, the 
			correct baud rate in the Serial Monitor is selected (if you wish to check output) and that all hardware connections are correct and functional. 
			All .ino files can be uploaded to either the Arduino or the ESP8266 12E. However, for the purpose of the product, only Arduino_integration.ino 
			needs to be uploaded to the Arduino and WiFi_client.ino needs to be uploaded to the ESP8266 12E.

			Wifi_Client.ino
				This file connects the ESP8266-12E WiFi module to WiFi. It also controls much of the external hardware. To run properly, change the value of 
				ssid on line 5 to the SSID of the network you are connecting to and change password to the correct password of the same network. For our 
				project, we used a mobile hotspot setup by one of our laptops. To test and debug, uncomment the print statements left in the code or insert 
				your own print statements. Upload this code to the ESP8266-12E.
			ArduinoHallEffect.ino
				This file was used to individually test code for activating and deactivating the buzzer. It was uploaded to the Arduino.
			Arduino_integration.ino
				This file was used to control all hardware components at once. To test, upload this code to the Arduino.
			RGB_LED.ino
				This file was used to demonstrate a full RGB cycle. To test, upload this code to the Arduino.
			pitches.h
				This header file contains all information needed to play different notes on the Piezo buzzer. Keep this file in the same directory as any code 
				that uses the buzzer.
			ESP8266_12-E__03-23-2018.txt
				This file was created to keep a record of work done. It was abandoned shortly after the first few work sessions.

		README1.txt
			The README file for all of the code. This includes code for the Arduino, ESP8266 12E, server, website and mobile application. It also includes
			the connections for the Arduino.

		hallsensor_hookup.png
			This file contains an image of how we connected the Hall Effect sensor, which was used to activate and deactivate a buzzer.


	2_unit_testing
		README2.txt
			This file contains documentation on how pieces of code were tested. Pieces may be functions, groups of functions or individual commands.


	3_integration_testing
		README3.txt
			This file contains documentation on how groups of files were tested. Interactions between files were tested as well.


	4_data_collection
		README4.txt
			This file contains information on the data collection done in this project.


	5_documentation
		Brochure.pdf
			This is the brochure used in the demonstration.
		Individual Contributions Breakdown.pdf
			This file shows the contributions breakdown for the first two reports and the first demo. Included is also an itemized list of individual 
			contributions.
		Presentation Slides.pdf
			This is a PDF version of the demonstration slides used in the demo.
		Technical Documentation.pdf
			This is an aesthetic PDF version of all of the technical documentation.
		User Documentation
			This is an aesthetic PDF version of all of the user documentation.



-----------------------------------------------------------------------------------------------------------------------------
Demo 2
	1_code
		Mobile_Application


		Server



		ino_files
			Please remember to connect all hardware prior to testing the code.

			Wifi_Client.ino
				This file connects the ESP8266-12E WiFi module to WiFi. It also controls much of the external hardware. Hardware control has been updated so 
				that the user can control the color of the RGB LED, turn all LEDs on and off and activate or deactivate the buzzer. To run properly, change 
				the value of ssid on line 5 to the SSID of the network you are connecting to and change password to the correct password of the same network. 
				For our project, we used a mobile hotspot setup by one of our laptops. To test and debug, uncomment the print statements left in the code or 
				insert your own print statements. Upload this code to the ESP8266-12E.
			ArduinoHallEffect.ino
				This file was used to individually test code for activating and deactivating the buzzer. It was uploaded to the Arduino.
			Arduino_integration.ino
				This file has been modified to control only the Piezo buzzer. Upload this code to the Arduino.
			pitches.h
				This header file contains all information needed to play different notes on the Piezo buzzer. Keep this file in the same directory as any code 
				that uses the buzzer.
			ESP8266_12-E__03-23-2018.txt
				Please disregard this file.

			README1.txt
				This file contains information on the contents of folder 1_code. It also contains instructions on how to connect the hardware.

			hallsensor_hookup.png
				This photo shows how to connect the Piezo buzzer. The connections to the buzzer are the same as they were in Demo 1. However, the pins on the 
				Arduino to which the buzzer's pins are connected may have swapped.


	2_unit_testing
		README2.txt
			This file contains documentation on how pieces of code were tested. Pieces may be functions, groups of functions or individual commands.


	3_integration_testing
		README3.txt
			This file contains documentation on how groups of files were tested. Interactions between files were tested as well.


	4_data_collection
		README4.txt
			This file contains information on the data collection done in this project.


	5_documentation
		Brochure.pdf
			This is the brochure used in the demonstration.
		Individual Contributions Breakdown.pdf
			This file shows the contributions breakdown for the first two reports and the first demo. Included is also an itemized list of individual 
			contributions.
		Presentation Slides.pdf
			This is a PDF version of the demonstration slides used in the demo.
		Technical Documentation.pdf
			This is an aesthetic PDF version of all of the technical documentation.
		User Documentation
			This is an aesthetic PDF version of all of the user documentation.