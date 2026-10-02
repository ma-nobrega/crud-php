CREATE DATABASE IF NOT EXISTS crud_produtos;
USE crud_produtos;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

-- Dados iniciais para testar a listagem.
INSERT INTO produtos (nome, quantidade, preco) VALUES
('Mouse USB', 25, 49.90),
('Teclado Mecânico', 12, 189.90),
('Monitor 24 polegadas', 8, 899.00);
