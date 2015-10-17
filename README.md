Install this https://projects.drogon.net/raspberry-pi/wiringpi/download-and-install/

```bash
    gpio export 11 out
    gpio export 15 out
    gpio export 16 out
    gpio export 13 out

    gpio export 18 out
    gpio export 12 out

    gpio write 22 0
    gpio write 18 0

    gpio export 11 0
    gpio export 15 0
    gpio export 16 0
    gpio export 13 0
