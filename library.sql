CREATE DATABASE Library;
USE Library;

-- Authors Table
CREATE TABLE Authors (
    authID INT PRIMARY KEY AUTO_INCREMENT,
    authLName VARCHAR(255),
    authFName VARCHAR(255),
    authMName VARCHAR(255)
);

-- Students Table
CREATE TABLE Students (
    studID INT PRIMARY KEY AUTO_INCREMENT,
    studFName VARCHAR(255),
    studMName VARCHAR(255),
    studLName VARCHAR(255)
);

-- Books Table
CREATE TABLE Books (
    bookID INT PRIMARY KEY AUTO_INCREMENT,
    bookTitle VARCHAR(255),
    bookCopies INT,
    authID INT,
    FOREIGN KEY (authID) REFERENCES Authors(authID) ON DELETE CASCADE
);

-- BorrowedBooks Table
CREATE TABLE BorrowedBooks (
    borrowID INT PRIMARY KEY AUTO_INCREMENT,
    studID INT,
    bookID INT,
    status ENUM('returned', 'not returned'),
    dateBorrowed DATETIME,
    dateToBeReturned DATETIME,
    FOREIGN KEY (studID) REFERENCES Students(studID) ON DELETE CASCADE,
    FOREIGN KEY (bookID) REFERENCES Books(bookID) ON DELETE CASCADE
);
