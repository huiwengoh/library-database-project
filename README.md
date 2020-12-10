# CS 3038 Project: Database for a Library 
## Description

This product is intended to keep track of books and members at a book library, as well as which books have been lent out, and how many copies of each book exist and are available. It consists of a database, as well as a user interface that allows the user to interact with it. 
This product has been created to be used by a librarian. 

## Instalation

The device running this application will need to have a web browser, MySQL and WAMP installed. This program was developed using Chrome and Firefox, MySQL 8.0 and WAMP 3.2.3 64bit.  
In order to run the application, the files in this repository will need to be stored inside the directory that WAMP is reading from. Then, MySQL will need to establish a connection with port 3306 using the user ‘root’ and no password, (port 3306 is being used because it is the default port in WAMP). Alternatively, the default port to connect WAMP and SQL could be set to a different unique port as required. Then a database called ‘library-database’ will need to be created, and its tables can be defined by running the queries stored in the file ‘createtables.sql’.
The program will be running on https://localhost:80 by default on WAMP, or on the port that is being used for the Apache server.

## User Manual 

index.php
├──
