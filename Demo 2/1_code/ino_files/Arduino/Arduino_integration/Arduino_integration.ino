//Written by Brendan Li
//Tested and debugged by Brendan Li and Jimmy Wen

// REMEMBER TO CONNECT NODEMCU GROUND TO ARDUINO GROUND

//For Large LED, Longest pin is ANODE (IT GOES TO 5V, NOT GND!)
// Define Pins

//INPUT is input from device to Arduino
//OUTPUT is output from Arduino to device

//Digital pins
#define RED 3             // RED pin of RGB (output to RGB)
#define LEDOUT 4          // Turn LED on/off
#define GREEN 5           // GREEN pin of RGB (output to RGB)
#define BLUE 6            // BLUE pin of RGB (output to RGB)
#define RGBOUTPUT 7       // Turn RGB on/off
#define BUZZEROUT 10      // Turn buzzer on or off

#define BUZZERIN 8        // Buzzer control
#define LEDIN 9           // LED ON/OFF status
#define RGBINPUT 11       // RGB ON/OFF status
#define HALLIN 12         // Hall Sensor input

//Analog pins
#define REDIN 0           // Read RED value
#define GREENIN 1         // Read GREEN value
#define BLUEIN 2          // Read BLUE value


#define delayTime 10 // fading time between colors

#include "pitches.h"


void setup()
{
  //Set pinModes
  //Outputs
  pinMode(RED, OUTPUT);
  pinMode(GREEN, OUTPUT);
  pinMode(BLUE, OUTPUT);
  pinMode(BUZZEROUT, OUTPUT);
  pinMode(RGBOUTPUT, OUTPUT);
  pinMode(LEDOUT, OUTPUT);
  //Initialize outputs
  //digitalWrite(RGBINPUT, LOW);
  /*
  digitalWrite(RED, HIGH);
  digitalWrite(GREEN, HIGH);
  digitalWrite(BLUE, HIGH);
  */
  digitalWrite(RGBOUTPUT, HIGH);
  
  //Inputs
  pinMode(RGBINPUT, INPUT);
  pinMode(REDIN, INPUT);
  pinMode(GREENIN, INPUT);
  pinMode(BLUEIN, INPUT);
  pinMode(LEDIN, INPUT);
  pinMode(BUZZERIN, INPUT);
  pinMode(HALLIN, INPUT);

  //Serial.println("Setup done");
  //Set serial port
  Serial.begin(9600);
}

// main loop
void loop()
{

  while(digitalRead(BUZZERIN) == HIGH && digitalRead(HALLIN) == HIGH){
    Serial.println("Buzzer on");
    //Serial.println("got into speaker loop");
    //int melody[] = {NOTE_C4, NOTE_G3, NOTE_G3, NOTE_A3, NOTE_G3, 0, NOTE_B3, NOTE_C4};
    int note = NOTE_C4;
    //int noteDuration = 8;
    //int noteDurations[] = {4, 8, 8, 4, 4, 4, 4, 4};

    //for (int thisNote = 0; thisNote < 8; thisNote++) {
    //Serial.println("running song loop");
      
    // to calculate the note duration, take one second divided by the note type.
    //e.g. quarter note = 1000 / 4, eighth note = 1000/8, etc.
    //int noteDuration = 1000 /// noteDurations[thisNote];
    //tone(BUZZEROUT, melody[thisNote], noteDuration);
    
    tone(BUZZEROUT, note);
    
    // to distinguish the notes, set a minimum time between them.
    // the note's duration + 30% seems to work well:
    //int pauseBetweenNotes = noteDuration * 1.30;
    //Serial.println("About to pause");
    //delay(pauseBetweenNotes);
    
    // stop the tone playing:
    //Serial.println("Done pausing");
    noTone(BUZZEROUT);
    //}
    
  }
}

/*
 * 2 inputs, 1 output
 * Speaker plays when both inputs are ON
 * Must check ESP input for HIGH
 * Then must make sure input from Hall Sensor HIGH
 * If both are high, then buzzer plays
 * */
