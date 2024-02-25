USE sakila;
-- 1. Get all the list of customers
SELECT * FROM customer;

-- 2. Get all the list of customers as well as their address
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address
FROM customer
LEFT JOIN address 
ON customer.address_id = address.address_id;

-- 3. Get all the list of customers as well as their address and city name/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city
FROM customer
LEFT JOIN address
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id;

-- 4. Get all the list of custsomers as well as their address, city, and country. 
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country
FROM customer
LEFT JOIN address
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
ORDER BY country;

--  5. Get all the list of customers who live in Bolivia.
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country
FROM customer
LEFT JOIN address
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE country = 'Bolivia';

-- 6. Get all the list of customers who live in Bolivia, Germany and Greece.
 SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country
FROM customer
LEFT JOIN address
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE country IN ("Bolivia", "Germany", "Greece");

-- 7. Get all the customers who live in the city of Baku.
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country
FROM customer
LEFT JOIN address
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE city = 'Baku';

-- 8. Get all the customers who live in the city of Baku, Beira, and Bergamo.
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country
FROM customer
LEFT JOIN address
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE city IN ("Baku", "Beira", "Bergamo");

-- 9. Get all the list of customers who live in a country where the country name's length is less than 5. 
