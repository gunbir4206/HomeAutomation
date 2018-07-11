#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <string.h>

const char* ssid = "AndroidAP";
const char* password = "password";

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
  
  pinMode(LEDpin, OUTPUT);
  digitalWrite(LEDpin, LOW);

  pinMode(buzzerPin, OUTPUT);
  digitalWrite(buzzerPin, LOW); 

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
    char rgb[20];
    int red, green, blue;
    char *redchar, *greenchar, *bluechar;
    String redstring, greenstring, bluestring;
  
    http.begin("http://173.70.106.138/rgb.txt");  //Specify request destination
    int httpCode = http.GET();        //Send the request
 
    if (httpCode > 0) { //Check the returning code
 
      String payload = http.getString();   //Get the request response payload
      http.end();
      
      payload.toCharArray(rgb, payload.length());

      redchar = strtok(rgb, " ");
      greenchar = strtok(NULL, " ");
      bluechar = strtok(NULL, " ");

      redstring = redchar;
      greenstring = greenchar;
      bluestring = bluechar;

      red = redstring.toInt();
      green = greenstring.toInt();
      blue = bluestring.toInt();

      // Serial Debugging stuff
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

//      http.begin("http://173.70.106.138/status.php");
//      http.addHeader("Content-Type", "application/x-www-form-urlencoded");
//      Serial.println("Sending RGB POST");
//      int httpResponse = http.POST("rgbstatus=red");
//      Serial.println(httpResponse);
//      http.end();
    }
  }
  
  // ON OFF FOR LED
  if (WiFi.status() == WL_CONNECTED){
    
    http.begin("http://173.70.106.138/lights.txt");  //Specify request destination
    int httpCode = http.GET();        //Send the request

    if (httpCode > 0) { //Check the returning code
      String payload = http.getString();   //Get the request response payload
      http.end();
//      Serial.println(payload);         //Print the response payload

      Serial.println("LED: ");

      if(payload.toInt() == 0){
        digitalWrite(LEDpin, LOW);
        Serial.println("Setting low");

//        http.begin("http://173.70.106.138/status.php");
//        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
//        Serial.println("Sending LED POST");
//        int httpResponse = http.POST("$ledstatus=0");
//        Serial.println(httpResponse);
//        http.end();
      }
      if(payload.toInt() == 1){
        digitalWrite(LEDpin, HIGH);
        Serial.println("Setting high");

//        http.begin("http://173.70.106.138/status.php");
//        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
//        Serial.println("Sending LED POST");
//        int httpResponse = http.POST("$ledstatus=1");
//        Serial.println(httpResponse);
//        http.end();
      }
    }
  }
  // ON OFF FOR BUZZER
  if (WiFi.status() == WL_CONNECTED){
    
    http.begin("http://173.70.106.138/buzzer.txt");  //Specify request destination
    int httpCode = http.GET();        //Send the request

    if (httpCode > 0) { //Check the returning code
      String payload = http.getString();   //Get the request response payload
      http.end();
      Serial.println(payload);         //Print the response payload

      Serial.println("Buzzer: ");

      if(payload.toInt() == 0){
        digitalWrite(buzzerPin, LOW);
        Serial.println("Setting low");

//        http.begin("http://173.70.106.138/status.php");
//        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
//        Serial.println("Sending Buzzer POST");
//        int httpResponse = http.POST("$buzzerstatus=0");
//        Serial.println(httpResponse);
//        http.end();
      }
      if(payload.toInt() == 1){
        digitalWrite(buzzerPin, HIGH);
        Serial.println("Setting high");

//        http.begin("http://173.70.106.138/status.php");
//        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
//        Serial.println("Sending Buzzer POST");
//        int httpResponse = http.POST("$buzzerstatus=1");
//        Serial.println(httpResponse);
//        http.end();
      }
      
    }
  }

  Serial.println("-------------------------------------------------------------");
  
//  http.end();   //Close connection

  delay(500);    //Send a request every 3 seconds
} 
