USE w3schools;

SELECT "CustomerID", "CustomerName", "Country", "City" 
FROM customers 
WHERE ("City"="Lisboa" OR "Country"="Spain")
ORDER BY "Country", "City";