USE lead_gen_business;
-- 1. What query would you run to get all the sites that client=15 owns?
-- SELECT sites.domain_name AS website, clients.client_id AS client_id
-- FROM clients
-- LEFT JOIN sites ON sites.client_id = clients.client_id
-- WHERE clients.client_id = 15;
-- 2. What query would you run to get total count of domain created for June 2011?
-- SELECT DATE_FORMAT(sites.created_datetime, "%M") AS month, COUNT(*) AS total_count
-- FROM sites
-- WHERE DATE_FORMAT(sites.created_datetime, "%Y") = 2011 AND DATE_FORMAT(sites.created_datetime, "%M") = "June"
-- GROUP BY DATE_FORMAT(sites.created_datetime, "%M");
-- 3. What query would you run to get the total revenue for the date November 19th 2012?
-- SELECT DATE_FORMAT(billing.charged_datetime, "%Y-%m-%d") AS date, SUM(billing.amount) AS revenue
-- FROM billing
-- WHERE DATE_FORMAT(billing.charged_datetime, "%Y-%m-%d") = "2012-11-19"
-- GROUP BY DATE_FORMAT(billing.charged_datetime, "%Y-%m-%d");
-- 4. What query would you run to get total revenue earned monthly each year for the client with an id of 1
SELECT client_id, SUM(amount) AS revenue, MONTHNAME(billing.charged_datetime) AS month, YEAR(billing.charged_datetime) AS year
FROM billing
WHERE client_id = 1
GROUP BY YEAR(billing.charged_datetime), MONTHNAME(billing.charged_datetime);



