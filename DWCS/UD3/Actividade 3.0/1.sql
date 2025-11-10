USE w3schools;
-- 1- Obter os identificadores, nomes, país e cidade da táboa de clientes cuxo país é España ou cidade é Lisboa, ordenados primeiro por país e despois por cidade
SELECT CustomerID, CustomerName, Country, City 
FROM customers
WHERE Country = 'Spain' OR City = 'Lisboa'
ORDER BY Country, City
;

-- 2- Insira un novo rexistro na táboa de categorías cun nome e unha descrición, pero sen indicar o CategoryID (asignarase automaticamente)
INSERT INTO categories (CategoryName,Description) VALUES ("Fruits", "Fresh fruit");

-- 3- Descubra o CategoryID asignado ao novo rexistro e actualice o valor da descrición do rexistro que acaba de inserir:
SELECT CategoryID FROM categories WHERE CategoryName = "Fruits";
UPDATE categories SET Description = "nuevo";
SELECT * FROM categories;

-- 4- Elimina o rexistro que acabas de engadir en categorías
DELETE FROM `w3schools`.`categories`
WHERE CategoryID=9;

-- 6- Obter a data máis recente para a táboa de pedidos
SELECT MAX(OrderDate) FROM orders; 

-- 7- Obter o número de rexistros na táboa de clientes
SELECT count(*) FROM customers;

-- 8- Obter o número de diferentes clientes que realizaron un pedido.
SELECT count(DISTINCT CustomerID) FROM orders;

-- 9- Obtén o número de os empregados que teñen a palabra psychology na columna de Notes
SELECT count(DISTINCT EmployeeID) 
FROM employees
WHERE Notes CONTAINS ("psychology")
;

-- 10-Obter os nomes dos produtos e o identificador da categoría á que pertencen daqueles produtos cuxo provedor teña os identificadores 5 ou 6. Utiliza a cláusula IN. Ordena o resultado por CategoryID e despois por ProductName
SELECT ProductName, CategoryID 
FROM products 
WHERE SupplierID IN (5,6)
ORDER BY CategoryID, ProductName
;