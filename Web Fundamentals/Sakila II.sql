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
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, country, LENGTH(country) as country_name_length
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE LENGTH(country.country) < 5
ORDER BY LENGTH(CONCAT(first_name, ' ', last_name)) DESC;

 -- 10. Get all the list of customers who live in a city name whose length is more than 10.  Order the result so that the customers who live in the same country are shown together. 
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, country.country, city.city, LENGTH(city.city) AS city_name_length
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE LENGTH(city.city) > 10
ORDER BY country.country, city.city;
--  11. Get all the list of customers who live in a city where the city name includes the word 'ba'.  For example Arratuba or Baiyin  should show up in your result.
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, city.city
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
WHERE city.city LIKE '%ba%';
-- 12. Get all the list of customers where the city name includes a space.  Order the result so that customers who live in the longest city are shown first.
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, city.city, LENGTH(city.city) AS city_name_length
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
WHERE city.city LIKE '% %'
ORDER BY LENGTH(city.city) DESC;
-- 13. Get all the customers where the country name is longer than the city name.
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, city.city, country.country, 
       LENGTH(city.city) AS city_name_length, LENGTH(country.country) AS country_name_length
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE LENGTH(country.country) > LENGTH(city.city);