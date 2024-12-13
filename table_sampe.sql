C:\Users\user>mysql -u root -p
MariaDB [(none)]> SHOW DATABASES;
MariaDB [(none)]> CREATE DATABASE testdb;
MariaDB [(none)]> SHOW DATABASES;
MariaDB [(none)]> use testdb
MariaDB [testdb]> CREATE TABLE users (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     name VARCHAR(50) NOT NULL,
    ->     email VARCHAR(100) NOT NULL,
    ->     password VARCHAR(100) NOT NULL
    -> );
MariaDB [testdb]> show tables;
MariaDB [testdb]> select * from users;
