CREATE TABLE person (
  id int not null auto_increment,
  fname varchar(25) NOT NULL,
  lname varchar(30) NOT NULL,
  age int NOT NULL,
  email varchar(50) NOT NULL,
  primary key (id)
);

INSERT into person(fname, lname, age, email)
VALUES
('Ricky', 'Bobby', 27, 'ricky@email.ca'),
('Jane', 'Doe', 28, 'jane@gmail.ca'),
('Jon', 'Doe', 52, 'jon@gmail.ca'),
('Zeb', 'Something', 18, 'zeb@email.com'),
('Laura', 'Smith', 42, 'laura@someemail.com'),
('Randy', 'Smith', 22, 'randy@gmail.com'),
('Pierce', 'Something', 39, 'pierce@anemail.ca');
