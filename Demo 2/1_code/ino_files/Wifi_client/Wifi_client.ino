/*
* FOR USE WITH ESP8266 NODEMCU: https://www.amazon.com/HiLetgo-Internet-Development-Wireless-Micropython/dp/B010O1G1ES
* Written by: Brendan Li
* Debugged and Tested by Gunbir Singh, Jimmy Wen
*/

#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <string.h>

// SSID and Password of wireless access point
const char* ssid = "*******"; // Replace with WiFi SSID
const char* password = "*******"; // Replace with WiFi's password

// Define Pins for each device
const int LEDpin = 14;
const int buzzerPin = 12;
const int redPin = 16;
const int greenPin = 5;
const int bluePin = 4;


void setup () {
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print("Connecting..");
  }
  
  // Initialize LED pin
  pinMode(LEDpin, OUTPUT);
  digitalWrite(LEDpin, LOW);
  
  // Initialize Buzzer pin
  pinMode(buzzerPin, OUTPUT);
  digitalWrite(buzzerPin, LOW); 
  
  // Initialize RGB pins
  pinMode(redPin,OUTPUT);
  digitalWrite(redPin, LOW);
  pinMode(greenPin, OUTPUT);
  digitalWrite(greenPin, LOW);
  pinMode(bluePin, OUTPUT);
  digitalWrite(bluePin,LOW);
}

void loop() 
{
  HTTPClient http;
  
  //CHECK FOR RGB TEXT  
  if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection 
    char rgb[15];
    int red, green, blue; // Integers for storing final RGB value
    char *redchar, *greenchar, *bluechar; // Character strings to store converted strings, converted from strings for strtok() function
    String redstring, greenstring, bluestring; // Initial string from http.getString()
  
    http.begin("http://173.70.106.138/rgb.txt");  //Specify request destination and file to read
    int httpCode = http.GET();        //Send the request
 
    if (httpCode > 0) { //Check the returning code
 
      String payload = http.getString();   //Get the request response payload
      
      payload.toCharArray(rgb, payload.length()); // Convert to char string to use strtok()
      
      // parse string to get individual RGB values with space as delimiter
      redchar = strtok(rgb, " ");
      greenchar = strtok(NULL, " ");
      bluechar = strtok(NULL, " ");
      
      // Setting character strings back to string objects to use toInt()
      redstring = redchar;
      greenstring = greenchar;
      bluestring = bluechar;
      
      // Convert string to integers
      red = redstring.toInt();
      green = greenstring.toInt();
      blue = bluestring.toInt();
      
      // show the values of RGB and set analog pins to said values
      Serial.println("RGB values:");
      Serial.print("Red:");
      Serial.print(red);
      Serial.print(" Green:");
      Serial.print(green);
      Serial.print(" Blue:");
      Serial.print(blue);
      Serial.println();
      analogWrite(redPin, red);
      analogWrite(greenPin, green);
      analogWrite(bluePin, blue);
      // Failed use of POST requests
      //http.POST("&status", "add.php", "$rgbstatus=1");
    }
  }
  
  // ON OFF FOR LED
  if (WiFi.status() == WL_CONNECTED){    
    http.begin("http://173.70.106.138/lights.txt");  //Specify request file
    int httpCode = http.GET();        //Send the request

    if (httpCode > 0) { //Check the returning code
      String payload = http.getString();   //Get the request response payload
      Serial.println(payload);         //Print the response payload

      Serial.println("LED: ");

      if(payload.toInt() == 0){
        digitalWrite(LEDpin, LOW);
        Serial.println("Setting low");
      }
      if(payload.toInt() == 1){
        digitalWrite(LEDpin, HIGH);
        Serial.println("Setting high");
      }
      //http.POST("&status", "add.php", "$ledstatus=1");
    }
  }
  // ON OFF FOR BUZZER
  if (WiFi.status() == WL_CONNECTED){
    
    http.begin("http://173.70.106.138/buzzer.txt");  //Specify request destination
    int httpCode = http.GET();        //Send the request

    if (httpCode > 0) { //Check the returning code
      String payload = http.getString();   //Get the request response payload
      Serial.println(payload);         //Print the response payload

      Serial.println("Buzzer: ");
      
      // Set pins low or high depending on the message
      if(payload.toInt() == 0){
        digitalWrite(buzzerPin, LOW);
        Serial.println("Setting low");
      }
      if(payload.toInt() == 1){
        digitalWrite(buzzerPin, HIGH);
        Serial.println("Setting high");
      }
      //http.POST("&status", "add.php", "$buzzerstatus=1");
    }
  }
  
  http.end();   //Close connection

  delay(500);    //Check file every .5 seconds
} 
