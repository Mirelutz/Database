-- Active: 1715984923338@@127.0.0.1@3306@adepti
CREATE TABLE IF NOT EXISTS infadepti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nume VARCHAR(255) NOT NULL,
    prenume VARCHAR(255) NOT NULL,
    domiciliu VARCHAR(255) NOT NULL,
    iq INT NOT NULL
);

INSERT INTO infadepti (nume, prenume, domiciliu, iq) VALUES
('Lolek', 'Bolek', 'townsville', 50),
('Stan', 'Bran', 'narnia', 70),
('Srinivasa', 'Ramanujan', 'india', 200);

