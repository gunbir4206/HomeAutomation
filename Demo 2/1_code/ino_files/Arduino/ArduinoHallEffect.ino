//Adapted from http://forum.arduino.cc/index.php?topic=260783.10
// Written by: Jimmy Wen
// Debugged and tested by: Brendan Li
#include "pitches.h"

#define TONEOUTPUT 8

//  MAS 23/08/2014
// Pin 13 is the speaker output
// If using earphone magnet, use right side earphone
const int speaker = 13;
const int hallInput=3;
const int A;

void setup()
{                
   pinMode(speaker, OUTPUT);
   digitalWrite(speaker,LOW);
   Serial.begin(9600);
}

void loop()
{
   A=digitalRead(hallInput);
   Serial.println(A);

   if(A==1)
   {
    digitalWrite(speaker, HIGH);
    tone(13, 55, 3000);
    delay(200);
   }
  else
  {
    digitalWrite(speaker, LOW);
    noTone(13);    
    delay(200);
  }
}
