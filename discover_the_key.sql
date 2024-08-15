CREATE OR REPLACE DATABASE discover_the_key;

USE discover_the_key;

CREATE OR REPLACE TABLE tentativas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nivel INT,
    resposta VARCHAR(255),
    correta BOOLEAN
);
