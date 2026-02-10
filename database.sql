CREATE DATABASE stock_db CHARACTER SET utf8mb4;
USE stock_db;

CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150),
    phone VARCHAR(30),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    stock INT,
    fk_supplier INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
        FOREIGN KEY (fk_supplier)
        REFERENCES suppliers(id)
        ON DELETE CASCADE
);
