
DROP DATABASE IF EXISTS frameworksenac;
CREATE DATABASE frameworksenac;
use frameworksenac;

CREATE TABLE car(
    id_user INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    carName VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL
);

INSERT INTO car(carName, model) VALUES
('Civic', 'Honda'),
('Onix ', 'Chevrolet'),
('Campass', 'Jeep');
