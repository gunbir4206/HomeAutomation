//Adapted from http://forum.arduino.cc/index.php?topic=260783.10
#include "pitches.h"

 #define TONEOUTPUT 8

//  MAS 23/08/2014
// Pin 13 is the speaker output
// If using earphone magnet, use right side earphone
int speaker = 13,in1=3,A;

void setup()
{                
   pinMode(speaker, OUTPUT);
   digitalWrite(speaker,LOW);
   Serial.begin(9600);
}

void loop()
{
   A=digitalRead(in1);
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
