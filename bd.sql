CREATE DATABASE lojinha;

CREATE TABLE products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ts TIMESTAMP,
    name_product VARCHAR(500),
    category VARCHAR(50),
    price DECIMAL(9, 2) UNSIGNED,
    description_product VARCHAR(5000)
);

INSERT INTO products (name_product, category, price, description_product) VALUES (
    "Creminho Cremoso",
    "cosméticos",
    9.00,
    "Potinho humilde de 1L do produto que fará seu cabelinho definir, brilhar e cheirar maravilhosamente."
);

INSERT INTO products (name_product, category, price, description_product) VALUES (
    "Biscoitinho Cocrante",
    "comida",
    2.50,
    "Biscoito com sabor de papel que não mata sua fome, mas distraí seu cérebro ansioso."
);

INSERT INTO products (name_product, category, price, description_product) VALUES (
    "Olhe Multiutilidades",
    "limpeza",
    8.00,
    "Pote de 800mL com um produto poderoso que limpa a caca mais grudenta e tão cheiroso que tira qualquer fedor de ovo podre."
);