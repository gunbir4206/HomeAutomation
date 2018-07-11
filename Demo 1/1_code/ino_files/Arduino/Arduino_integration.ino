// REMEMBER TO CONNECT NODEMCU GROUND TO ARDUINO GROUND

//For Large LED, Longest pin is ANODE (IT GOES TO 5V, NOT GND!)
// Define Pins
#define RED 3
#define GREEN 5
#define BLUE 6
#define RGBINPUT 7
#define BUZZERIN 8
#define LEDOUT 4

#define REDIN A0
#define GREENIN A1
#define BLUEIN A2
#define LEDIN 9
#define BUZZEROUT 10

#define delayTime 10 // fading time between colors

#include "pitches.h"


void setup()
{
  //Set pinModes
  //Outputs
  pinMode(RED, OUTPUT);
  pinMode(GREEN, OUTPUT);
  pinMode(BLUE, OUTPUT);
  pinMode(TONEOUTPUT, OUTPUT);
  //Initialize outputs
  digitalWrite(RGBINPUT, LOW);
  digitalWrite(RED, HIGH);
  digitalWrite(GREEN, HIGH);
  digitalWrite(BLUE, HIGH);
  
  //Inputs
  pinMode(RGBINPUT, INPUT);
  pinMode(REDIN, INPUT);
  pinMode(GREENIN, INPUT);
  pinMode(BLUEIN, INPUT);
  pinMode(LEDIN, INPUT);
  pinMode(BUZZERIN, INPUT);

  //Set serial port
  Serial.begin(9600);
}

// define variable integers
int redValue;
int greenValue;
int blueValue;
int rgbIN = LOW;
int led = LOW;


// main loop
void loop()
{
  /*
  redValue = 255; // choose a value between 1 and 255 to change the color.
  greenValue = 0;
  blueValue = 0;
  */
  //Serial.println("All red now");
  led = digitalRead(LEDIN);
  rgbIN = digitalRead(RGBINPUT);
  buzzer = digitalRead(BUZZERIN);
  
  //analogWrite(RED, 0);
  //Serial.println("got here");
  //Serial.println(rgbIN);

  //LED control
  if(led == HIGH)
  {
    digitalWrite(LEDOUT, HIGH);
  }
  else
  {
    digitalWrite(LEDOUT, LOW);
  }
  
  //RGB control for specific input. No longer loops through RGB cycle
  if(rgbIN == HIGH){
    //Serial.println("RGB input high");

    redValue = analogRead(REDIN);
    greenValue = analogRead(GREENIN);
    blueValue = analogRead(BLUEIN);

    analogWrite(RED, redValue);
    analogWrite(GREEN, greenValue);
    analogWrite(BLUE, blueValue);
  }
/*
    for(int i = 0; i < 255; i += 1) // fades out red bring green full when i=255
    {
      redValue -= 1;
      greenValue += 1;
      analogWrite(RED, redValue);
      analogWrite(GREEN, greenValue);
      //Serial.println("Running red to green");
      delay(delayTime);
    }

    redValue = 0;
    greenValue = 255;
    blueValue = 0;
    //Serial.println("All green");

    for(int i = 0; i < 255; i += 1)  // fades out green bring blue full when i=255
    {
      greenValue -= 1;
      blueValue += 1;
      analogWrite(GREEN, greenValue);
      analogWrite(BLUE, blueValue);
      //Serial.println("Running green to blue");
      delay(delayTime);
    }

    redValue = 0;
    greenValue = 0;
    blueValue = 255;
    //Serial.println("All blue");

    for(int i = 0; i < 255; i += 1)  // fades out blue bring red full when i=255
    {
      redValue += 1;
      blueValue -= 1;
      analogWrite(RED, redValue);
      analogWrite(BLUE, blueValue);
      delay(delayTime);
      //Serial.println("Running blue to red");
    }
  } // loop rgb cycling
  */
  
  //Serial.println("got out of RGB loop");
  
  if(digitalRead(BUZZERIN) == HIGH){
    //Serial.println("got into speaker loop");
    int melody[] = {NOTE_C4, NOTE_G3, NOTE_G3, NOTE_A3, NOTE_G3, 0, NOTE_B3, NOTE_C4};
    int noteDurations[] = {4, 8, 8, 4, 4, 4, 4, 4};

    for (int thisNote = 0; thisNote < 8; thisNote++) {
    //Serial.println("running song loop");
      
    // to calculate the note duration, take one second divided by the note type.
    //e.g. quarter note = 1000 / 4, eighth note = 1000/8, etc.
    int noteDuration = 1000 / noteDurations[thisNote];
    tone(BUZZEROUT, melody[thisNote], noteDuration);

    // to distinguish the notes, set a minimum time between them.
    // the note's duration + 30% seems to work well:
    int pauseBetweenNotes = noteDuration * 1.30;
    //Serial.println("About to pause");
    delay(pauseBetweenNotes);
    // stop the tone playing:
    //Serial.println("Done pausing");
    noTone(BUZZEROUT);
    }
  }
}
