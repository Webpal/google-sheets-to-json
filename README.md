# Google Sheets to JSON
small script to turn a google sheet tab into a JSON endpoint.

# instructions
1) First you have to make your Google sheets document public for web access. Inside Google Sheets, choose File->Publish to the web. You can choose the entire document or just a specific tab.
2) Look at the URL of your Google Sheets document (note, not on the published URL but on the actual google sheet). In this URL you'll find your sheet id. The URL should look something like this: https://docs.google.com/spreadsheets/d/YOUR-UNIQUE-DOCUMENT-ID/edit#gid=0
3) Note in what tab the data is that you want to access as a JSON endpoint. The tab will be referred to by a number from left to rigth (usually you'll want tab 1)
4) Clone the repository to your computer (git clone)
5) Rename the file env.example.php to env.php
6) In env.php insert your sheets id, what tab you want to use and choose a name for your json cache file
7) Run sheets-to-json.php (with later versions of PHP you can use terminal, go to the folder and run *php -S localhost:8000* to start a local webserver. Go to localhost:8000/sheets-to-json.php to see your Google Sheet presented row by row as JSON!