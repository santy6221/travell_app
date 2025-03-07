CREATE SCHEMA IF NOT EXISTS travel_app;

USE travel_app;

CREATE TABLE cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    currency_code VARCHAR(3) NOT NULL,
    currency_symbol VARCHAR(5) NOT NULL
);

-- DATOS INICIALES
INSERT INTO cities (name, currency_code, currency_symbol) VALUES
('London', 'GBP', '£'),
('New York', 'USD', '$'),
('Paris', 'EUR', '€'),
('Tokyo', 'JPY', '¥'),
('Madrid', 'EUR', '€');