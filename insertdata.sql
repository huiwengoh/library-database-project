insert into member (name, email, phone_num) values ('John Smith', 'jsmith@gmail.com', '3847275692');
insert into member (name, email, phone_num) values ('David Gold', 'dgold@gmail.com', '2614804811');
insert into member (name, email, phone_num) values ('Jane Doe', 'jdoe@gmail.com', '7913725593');
insert into member (name, email, phone_num) values ('Paul Kim', 'pkim@gmail.com', '9125837353');
insert into member (name, email, phone_num) values ('Edward Jones', 'ejones@gmail.com', '5729471137');
insert into member (name, email, phone_num) values ('Lindsay Brown', 'lbrown@gmail.com', '7562957265');
insert into member (name, email, phone_num) values ('Juan Carlos', 'jcarlos@gmail.com', '9824725775');
insert into member (name, email, phone_num) values ('Maria Lopes', 'mlopez@gmail.com', '6729475628');
insert into member (name, email, phone_num) values ('Daniel Lee', 'dlee@gmail.com', '2950184672');
insert into member (name, email, phone_num) values ('Mark Williams', 'mwilliams@gmail.com', '3759174590');

insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780078022159', 'Database System Concepts', 'Avi Silberschatz', 7, 2019, 'McGraw-Hill', 'Textbook', 1376);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780847901753', 'Green Eggs and Ham', 'Dr. Seuss', 1, 1960, 'Random House', 'Books for Children', 60);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780007355914', 'Green Eggs and Ham', 'Dr. Seuss', 22, 2020, 'Harper Collins', 'Books for Children', 64);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780747532743', 'Harry Potter and the Philosophers Stone', 'J. K. Rowling', 1, 1997, 'Bloomsbury Publishing', 'Books for Children', 224);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780877792956', 'The Merriam Webster Dictionary', 'Merriam-Webster', 1, 2016, 'Merriam Webster', 'Dictionary', 960);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9781619544987', 'The Pilots Manual: Flight School', 'The Pilots Manual Editorial Board', 5, 2017, 'Aviation Supplies and Academics', 'Textbook', 608);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780131495081', 'Physics for Engineers and Scientists', 'Douglas Giancoli', 4, 2008, 'Pearson', 'Textbook', 1328);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780141346458', 'Charlie and the Chocolate Factory', 'Roald Dahl', 1, 2013, 'Puffin', 'Books for Children', 208);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780743273565', 'The Great Gatsby', 'F. Scott Fitzgerald', 5, 2015, 'Scribner Book Company', 'Classics', 180);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780141187761', '1984', 'George Orwell', 1, 2004, 'Penguin Classics', 'Classics', 400);
insert into book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) values ('9780141182704', 'Animal Farm', 'George Orwell', 1, 2000, 'Penguin Classics', 'Classics', 144);

insert into book_copy (ISBN) values ('9780078022159');
insert into book_copy (ISBN) values ('9780078022159');
insert into book_copy (ISBN) values ('9780078022159');
insert into book_copy (ISBN) values('9780847901753');
insert into book_copy (ISBN) values('9780007355914');
insert into book_copy (ISBN) values('9780007355914');
insert into book_copy (ISBN) values('9780747532743');
insert into book_copy (ISBN) values('9780877792956');
insert into book_copy (ISBN) values('9780877792956');
insert into book_copy (ISBN) values('9780877792956');
insert into book_copy (ISBN) values('9781619544987');
insert into book_copy (ISBN) values('9780131495081');
insert into book_copy (ISBN) values('9780141346458');
insert into book_copy (ISBN) values('9780141346458');
insert into book_copy (ISBN) values('9780743273565');
insert into book_copy (ISBN) values('9780141187761');
insert into book_copy (ISBN) values('9780141187761');
insert into book_copy (ISBN) values('9780141182704');
insert into book_copy (ISBN) values('9780141182704');
insert into book_copy (ISBN) values('9780141182704');

insert into borrows (memberID, bookID, borrow_date) values (1, 1, '2020-12-10');
insert into borrows (memberID, bookID, borrow_date) values (1, 10, '2020-12-10');
insert into borrows (memberID, bookID, borrow_date) values (2, 5, '2020-12-10');
insert into borrows (memberID, bookID, borrow_date) values (5, 12, '2020-12-10');
insert into borrows (memberID, bookID, borrow_date) values (10, 8, '2020-12-10');