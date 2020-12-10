# CS 3038 Project: Database for a Library 
## Description

This product is intended to keep track of books and members at a book library. It allows the user to lend a book to a member of the library, to return a book to the library, to add books and members, and to see all of the books and how many copies exist and are available, and to see all of the members and their borrowed books. 

This product has been created with a librarian as the end user in mind. 

The navigation in the website is as follows:
```
library-database
└── index.php
    ├── lend_book.php
    │   └──lend_book_results.php
    ├── return_book.php
    │   └──return_book_results.php
    ├── add_member.php
    │   └──newmember.php
    ├── add_book.php
    │   └──newbook.php
    │      └──newbookinfo.php
    ├── view_books.php
    └── view_members.php
```
## Instalation

The device running this application will need to have a web browser, MySQL and WAMP installed. This program was developed using Chrome and Firefox, MySQL 8.0 and WAMP 3.2.3 64bit and ran using port 80 for the Apache server and port 3306 for the MySQL server.  

In order to run the application, the files in this repository will need to be stored inside the directory that WAMP is reading from. Then, MySQL will need to establish a connection with port 3306 using the user ‘root’ and no password, (port 3306 is being used because it is the default port in WAMP). Alternatively, the default port to connect WAMP and SQL could be set to a different unique port as required. Then a database called ‘library-database’ will need to be created, and its tables can be defined by running the queries stored in the file ‘createtables.sql’.
The program will be running on https://localhost:80 by default from WAMP, or on the port that is being used for the Apache server.

## User Manual 
The user will start off on the index page and should navigate to the selected page by clicking on the button of their choice. 
- When a librarian wants to lend or return a book, the member should hand the librarian their member ID card and the book. The librarian will then input the memberID and the bookID, or ISBN into the database as prompted. 
- To add a member into the database, the librarian will need their name, email, and phone number. 
- To add a book into the library, the librarian will need the ISBN, title, author, edition, publishing year, publisher,and number of pages.



