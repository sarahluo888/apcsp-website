#!/bin/bash


echo -e "Content-type: text/html\n\n"

echo "<h1>Pi Statuses</h1>"
echo "<pre>$(./rpistatus)</pre>"

