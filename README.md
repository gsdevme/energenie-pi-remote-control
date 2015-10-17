Install this https://projects.drogon.net/raspberry-pi/wiringpi/download-and-install/

```bash
    gpio export 17 out
    gpio export 22 out
    gpio export 23 out
    gpio export 24 out
    gpio export 25 out
    gpio export 27 out

    gpio -1 write 25 0
    gpio -1 write 24 0

    gpio -1 write 17 0
    gpio -1 write 22 0
    gpio -1 write 23 0
    gpio -1 write 27 0
