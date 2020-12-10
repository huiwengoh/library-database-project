create table member
(memberID	int 	auto_increment,
 name		varchar(20),
 email		varchar(30),
 phone_num	varchar(12),
 primary key (memberID)
);

create table book_info
(ISBN		varchar(13),
 title		varchar(40),
 author		varchar(40),
 edition		int,
 year_published	int,
 publisher	varchar(40),
 genre		varchar(20),
 pages		int,
 primary key (ISBN)
);

create table book_copy
(bookID		int 	auto_increment,
 ISBN		varchar(13),
 primary key (bookID),
 foreign key (ISBN) references book_info(ISBN)
 	on delete cascade
);

create table borrows
(memberID	int,
 bookID		int,
 borrow_date	date,
 primary key (memberID, bookID),
 foreign key (memberID) references member(memberID),
 foreign key (bookID) references book_copy(bookID)
);