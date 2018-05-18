CREATE DATABASE midtrans;
USE midtrans;

CREATE TABLE user(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    name varchar(50),
    balance int
);

CREATE TABLE trans_type(
    trans_type_id INT PRIMARY KEY, 
    trans_type varchar(20)
);

CREATE TABLE transaction(
    trans_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNSIGNED,
    trans_type_id INT,
    trans_value INT,
    trans_date DATE,
    trans_description VARCHAR(150),
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (trans_type_id) REFERENCES trans_type(trans_type_id)
);


INSERT trans_type(trans_type_id,trans_type) VALUES(1,"credit"),(2,"debit");
INSERT user(id,name,balance) VALUES(1,"Nelson",200000),(2,"Budi",10000);
INSERT transaction(user_id,trans_type_id,trans_value,trans_date,trans_description) VALUES(1,1,2000,NOW(),"Susu");
