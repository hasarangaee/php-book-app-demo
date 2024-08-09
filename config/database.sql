CREATE DATABASE book_database;

USE book_database;

CREATE TABLE authors (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(255) NOT NULL
);

CREATE TABLE categories (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(255) NOT NULL
);

CREATE TABLE books (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(255) NOT NULL,
                       author_id INT,
                       category_id INT,
                       FOREIGN KEY (author_id) REFERENCES authors(id),
                       FOREIGN KEY (category_id) REFERENCES categories(id)
);
