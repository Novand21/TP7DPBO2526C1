-- Create the database
CREATE DATABASE db_tcg;
USE db_tcg;

-- expansions (Base table)
CREATE TABLE expansions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    set_name VARCHAR(100) NOT NULL,
    release_year INT NOT NULL
);

-- cards linking to expansions
CREATE TABLE cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expansion_id INT NOT NULL,
    card_name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    FOREIGN KEY (expansion_id) REFERENCES expansions(id) ON DELETE CASCADE
);

-- orders linking to cards)
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    card_id INT NOT NULL,
    buyer_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    order_date DATE NOT NULL,
    FOREIGN KEY (card_id) REFERENCES cards(id) ON DELETE CASCADE
);

-- insert data
INSERT INTO expansions (set_name, release_year) VALUES 
('Base Set', 1999),
('Scarlet & Violet', 2023);

INSERT INTO cards (expansion_id, card_name, price, stock) VALUES 
(1, 'Charizard Holo', 500.00, 2),
(1, 'Pikachu', 15.00, 10),
(2, 'Miraidon ex', 25.50, 5);

INSERT INTO orders (card_id, buyer_name, quantity, order_date) VALUES 
(2, 'Ash Ketchum', 1, CURDATE()),
(3, 'Nemona', 2, CURDATE());