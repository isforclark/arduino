#include <SPI.h>
#include <Dhcp.h>
#include <Dns.h>
#include <Ethernet.h>
#include <EthernetClient.h>
#include <EthernetServer.h>
#include <EthernetUdp.h>
#include <DHT.h>
#define DHTPIN 7
#define DHTTYPE DHT11   // DHT 22  (AM2302), AM2321


const int ledPin = 13;
const int sensorPin = 4;
const double alpha = 0.75;              // smoothing參數 可自行調整0~1之間的值
const double beta = 0.5;                // find peak參數 可自行調整0~1之間的值
const int period = 20;                  // sample脈搏的delay period  
unsigned long lastConnectionTime = 0;          // last time you connected to the server, in milliseconds
boolean lastConnected = false;                 // state of the connection last time through the main loop
const unsigned int postingInterval = 10000;  // delay between updates, in milliseconds




byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };  

IPAddress dnServer(163, 15, 189, 1);

IPAddress gateway(163, 15, 192,254);

IPAddress subnet(255, 255, 255, 128);

IPAddress ip(163, 15, 192, 173);

IPAddress web_ip(163, 15, 192, 145);

EthernetServer server(80);

EthernetClient client;


DHT dht(DHTPIN, DHTTYPE);


String readString = String(30);

unsigned long previousMillis = 0;
const long interval = 5000;

void setup(){
    Serial.begin(9600);
  while (!Serial) {
    Serial.print("no serial");
  }
  Ethernet.begin(mac, ip, dnServer, gateway, subnet);
  server.begin();
  Serial.print("server is at ");
  Serial.println(Ethernet.localIP());

Serial.println("DHT11 test!");
  dht.begin();
  
    
    pinMode(ledPin, OUTPUT);
    //Serial.begin(9600);               // Set the baud rate of the Serial Monitor
    //BTSerial.begin(9600);               // HC-06 baud rate 預設為9600
}


void loop(){
    // if there's incoming data from the net connection.
  // send it out the serial port.  This is for debugging
  // purposes only:
  if (client.available()) {
    char c = client.read();
    Serial.print(c);
  }

  // if there's no net connection, but there was one last time
  // through the loop, then stop the client:
  if (!client.connected() && lastConnected) {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();
  }

  // if you're not connected, and ten seconds have passed since
  // your last connection, then connect again and send data:
  if(!client.connected() && (millis() - lastConnectionTime > postingInterval)) {
    sensor();
  }
  // store the state of the connection for next time through
  // the loop:
  lastConnected = client.connected();
 
}



void sensor(){
     
    delay(2000);//測量溫濕
    float h = dht.readHumidity();
    // Read temperature as Celsius (the default)
    float t = dht.readTemperature();
    // Read temperature as Fahrenheit (isFahrenheit = true)
    float f = dht.readTemperature(true);
  
    // Check if any reads failed and exit early (to try again).
    if (isnan(h) || isnan(t) || isnan(f)) {
      Serial.println("Failed to read from DHT sensor!");
      return;
    }
  
    // Compute heat index in Fahrenheit (the default)
    float hif = dht.computeHeatIndex(f, h);
    // Compute heat index in Celsius (isFahreheit = false)
    float hic = dht.computeHeatIndex(t, h, false);

   /* 
 // 測量心跳
//  測量心跳並用藍芽傳給Android
//  讀入sensor的值
//  對值做smoothing
//  找出值得peak，即為有heart beat產生
//  計算每分鐘心跳頻率，用藍芽傳給手機
    


    int count = 0;                              // 記錄心跳次數
    double oldValue = 0;                        // 記錄上一次sense到的值
    double oldChange = 0;                       // 記錄上一次值的改變
       
    unsigned long startTime = millis();         // 記錄開始測量時間
    Serial.print("heartbeat start:");
    while(millis() - startTime < 2500) {       // sense 10 seconds
        int rawValue = analogRead(sensorPin);   // 讀取心跳sensor的值
        double value = alpha*oldValue + (1-alpha)*rawValue;     //smoothing value
   
        //find peak
        double change = value-oldValue;         // 計算跟上一次值的改變量
        if (change>beta && oldChange<-beta) {   // heart beat
            count = count + 1;
        }
         
        oldValue = value;
        oldChange = change;
        delay(2500);
    }

  */
  
  EthernetClient client = server.available();
  unsigned long currentMillis = millis();
  
  if(client.connect(web_ip,8080)){
    Serial.println("connect");
  
  client.print("GET /arduino/salvardados.php?");


  client.print("h=");
  client.print(h);
 
  client.print("&t=");
  client.print(t);
  //client.print(f);
  //client.print(100);
  client.print("&hic=");
  client.print(hic);
  client.print("&hif=");
  client.print(hif);
  //client.print(101);
  client.println();







   /*
  client.print("Humidty=");
 // client.print(h);
  client.print(100);


  client.print("&Temperature=");
 // client.print(t);
  //client.print(f);
   client.print(100);
  client.print("&Heat_hic=");
  //client.print(hic);
   client.print("&Heat_hif=");
  //client.print(hif);
  client.print(101);
  client.println();
*/
  Serial.print("Humidity: ");
  Serial.print(h);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(t);
  Serial.print(" *C ");
 // Serial.print(f);
  //Serial.print(" *F\t");
  Serial.print("Heat_hic: ");
  Serial.print(hic);
  Serial.print(" *C ");
  Serial.print("Heat_hif: ");
  Serial.print(hif);
  Serial.println(" *F");
  //Serial.print("HeartBeat:");
  //Serial.println(count);
  
  client.stop();
  }
  else{
  Serial.println(" no connect");
  
  client.stop();
  }


 if(client)
  {
   while(client.connected())
    {
      if(client.available())
    {
     char c = client.read();
     
     if(readString.length()<30){
      readString +=(c);
     }
     if(c == '\n')
     {
     client.println("HTTP/1.1 200 OK");
     client.println("Content-Type: text/html");
     client.println();
      
     client.println("<!doctype html>");
     client.println("<html>");
     client.println("<head>");
     client.println("<title>Tutorial</title>");
     client.println("<meta name=\"viewport\"connect=\"width=320\">");
     client.println("<meta name=\"viewport\"connect=\"width=device-width\">");
     client.println("<meta charset=\"utf-8\">");
     client.println("<meta name=\"viewport\" content=\"intial-scale=1.0,user-scalable=no\">");
     client.println("<meta http-equiv=\"refresh\">content=\"3;URL=http://163, 15, 192, 244:8080\">");
     client.println("</head>");
     client.println("<body>");
     client.println("<center>");

     client.println("<font size=\"5\" face=\"verdana\" color=\"green\">Android</font>");
     client.println("<font size=\"3\" face=\"verdana\" color=\"red\">&</font>");
     client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">Arduino</font><br/>");

     
     client.println("<font size=\"5\" face=\"verdana\" color=\"red\">Humidity: </font>");
     client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">");
     client.print(h);
     client.println("%\t");
     client.println("</font><br>");

     client.println("<font size=\"5\" face=\"verdana\" color=\"red\">Temperature:</font>");
     client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">");
     client.print(t);
     client.print("*C ");
     client.print(f);
     client.println(" *F\t");
     client.println("</font><br>");

     client.println("<font size=\"5\" face=\"verdana\" color=\"red\">Heat index:</font>");
     client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">");
     client.print(hic);
     client.print(" *C");
     client.print(hif);
     client.println(" *F");
     client.println("</font><br>");

     client.println("<p><a herf=\"http://localhost:8080/arduino/indexphp.php\" target=\"_blank\">Database</a></p>");

     client.println("</center>");
     client.println("</body>>");
     client.println("</html>");

     readString ="";
     
     client.stop();
     
     }
    }
    }
  
  }
   delay(60000);
  }
