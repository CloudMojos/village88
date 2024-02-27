USE sakila;
-- 1. How many customers are there for each country?  Have your result display the full country name and the number of customers for each country.
-- SELECT country.country AS country, COUNT(customer.customer_id) AS total_number_of_customers
-- FROM customer
-- LEFT JOIN address ON customer.address_id = address.address_id
-- LEFT JOIN city ON address.city_id = city.city_id
-- LEFT JOIN country ON city.country_id = country.country_id
-- GROUP BY country.country 
-- ORDER BY country.country;
-- 2. How many customers are there for each city?  Have your result display the full city name, the full country name, as well as the number of customers for each city.
-- SELECT country.country AS country, city.city AS city, COUNT(customer.customer_id) AS customers_per_city
-- FROM customer
-- LEFT JOIN address ON customer.address_id = address.address_id
-- LEFT JOIN city ON address.city_id = city.city_id
-- LEFT JOIN country ON city.country_id = country.country_id
-- GROUP BY city.city, country.country;
-- 1. Retreive both the average rental amount, the total rental amount, as well as the total number of transactions for each month of each year
-- SELECT DATE_FORMAT(payment.payment_date, "%M-%Y") AS month_and_year, SUM(payment.amount), COUNT(*) AS total_transactions, AVG(payment.amount)
-- FROM payment
-- GROUP BY DATE_FORMAT(payment.payment_date, "%M-%Y");
-- 2. Your manager comes and asks you to pull the payment reports based on the hour of the day.  The manager wants to know which hour the company earns the most money/payment.  Have your sql query generate the top 10 hours of the day with the most sales.  Have the first row of your result be the hour with the most payments received.
SELECT DATE_FORMAT(payment.payment_date, "%h:%p") as hour_of_the_day, SUM(payment.amount) as total_payments_received 
FROM payment
GROUP BY hour_of_the_day 
ORDER BY total_payments_received DESC;