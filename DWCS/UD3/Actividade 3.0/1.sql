USE w3schools;
-- 1- Obter os identificadores, nomes, país e cidade da táboa de clientes cuxo país é España ou cidade é Lisboa, ordenados primeiro por país e despois por cidade
SELECT CustomerID, CustomerName, Country, City 
FROM customers
WHERE Country = 'Spain' OR City = 'Lisboa'
ORDER BY "Country", "City"
;

-- 2- Insira un novo rexistro na táboa de categorías cun nome e unha descrición, pero sen indicar o CategoryID (asignarase automaticamente)
INSERT INTO categories (CategoryName,Description) VALUES ("Fruits", "Fresh fruit");

-- 3- Descubra o CategoryID asignado ao novo rexistro e actualice o valor da descrición do rexistro que acaba de inserir:
SELECT CategoryID FROM categories WHERE CategoryName = "Fruits";
UPDATE categories SET Description = "nuevo";
SELECT * FROM categories;