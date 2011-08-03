# cakephp-geoip

(Simple) CakePHP Component wrapper for Maxmind's GeoIP PHP API. Retrieves the country name and/or country code for a given IPv4 address.

## Requirements

MaxMind pure PHP module: [geoip.inc]
MaxMind GeoLite Country: [GeoIP.dat.gz]

## Installation

1. Place [geoip.inc] in ./vendors/.
1. Decompress [GeoIP.dat.gz] and place GeoIP.dat.gz in ./app/webroot/.

## Common Errors

**Fatal error: Call to undefined function geoip_open()**. Check if ./app/vendors/geoip.inc is present.
**Can not open app/webroot/GeoIP.dat**. Check if ./app/webroot/GeoIP.dat is present.

## CakePHP Test Suite

Assuming your web server is "localhost", and CakePHP is located in "cakephp", you can access the Test Suite via your web browser:

http://localhost/cakephp/app/webroot/test.php?case=geoip.test.php&app=true

Otherwise, you may also navigate via the navigation bar: App &gt; Test Cases &gt; GeoIP.

If all goes well, output like the following is produced:

Individual test case: geoip.test.php
1/1 test cases complete: 8 passes, 0 fails and 0 exceptions.

[geoip.inc]:http://geolite.maxmind.com/download/geoip/api/php/geoip.inc
[GeoIP.dat.gz]:http://geolite.maxmind.com/download/geoip/database/GeoLiteCountry/GeoIP.dat.gz
