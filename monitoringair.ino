#include <WiFi.h>
#include <HTTPClient.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>

const int relayPin = 26;
const int buzzerPin = 27;
const int sensorAirPin = 34;

const char* ssid = "Kinan's";
const char* password = "nanik cantik";
const char* serverName = "http://10.114.132.105/db_monitoring_air/update.php";
LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
  Serial.begin(115200);
  pinMode(relayPin, OUTPUT);
  pinMode(buzzerPin, OUTPUT);
  pinMode(sensorAirPin, INPUT);
  
  lcd.init();
  lcd.backlight();
  lcd.setCursor(0, 0); lcd.print("Smart Water Mon.");
  
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) { delay(500); Serial.print("."); }
  
  lcd.clear(); lcd.print("Connected!");
  delay(1000);
  digitalWrite(relayPin, HIGH); // Inisialisasi awal
}

void loop() {
  int rawValue = analogRead(sensorAirPin);
  
  // LOGIKA: Jika sensor dicabut, rawValue biasanya di bawah 50. 
  // Jika sensor dicelup, nilainya naik sampai 3000+.
  int ketinggian = map(rawValue, 0, 3000, 0, 1000); 
  if (ketinggian > 1000) ketinggian = 1000;
  
  String status;
  
  // 1. Logika Cabut Sensor
  if (rawValue < 50) { 
    status = "Cabut Sensor";
    digitalWrite(relayPin, HIGH); // OFF
    digitalWrite(buzzerPin, LOW); // OFF
  } 
  // 2. Logika Bahaya (>= 500)
  else if (ketinggian >= 500) {
    status = "Bahaya";
    digitalWrite(relayPin, LOW);  // OFF
    // Buzzer Bip-Bip
    digitalWrite(buzzerPin, HIGH); delay(200); digitalWrite(buzzerPin, LOW); delay(200);
  } 
  // 3. Logika Sedang (400 - 499)
  else if (ketinggian >= 400) {
    status = "Sedang";
    digitalWrite(relayPin, HIGH);  // NYALA
    digitalWrite(buzzerPin, LOW); // OFF
  } 
  // 4. Logika Normal (di bawah 400)
  else {
    status = "Normal";
    digitalWrite(relayPin, HIGH);  // NYALA
    digitalWrite(buzzerPin, LOW); // OFF
  }

  // Debug & Kirim data
  Serial.println("Ketinggian: " + String(ketinggian) + " | Status: " + status);
  
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverName);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    http.POST("ketinggian=" + String(ketinggian) + "&status=" + status);
    http.end();
  }

  // Tampil LCD
  lcd.clear();
  lcd.setCursor(0, 0); lcd.print("Air: " + String(ketinggian) + " cm");
  lcd.setCursor(0, 1); lcd.print(status);

  delay(1000); 
}