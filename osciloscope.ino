int lectur = A0;
float R1 = 20000.0;
float R2 = 10000.0;
void setup () {
 Serial.begin(9600);
}

void loop() {
   float data = analogRead(lectur) * (5.0 / 1023.0);
   float vout = data*((R1 + R2)/R2);
   Serial.println(vout);
   delay(100);
}