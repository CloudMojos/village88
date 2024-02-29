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
-- SELECT client_id, SUM(amount) AS revenue, MONTHNAME(billing.charged_datetime) AS month, YEAR(billing.charged_datetime) AS year
-- FROM billing
-- WHERE client_id = 1
-- GROUP BY YEAR(billing.charged_datetime), MONTHNAME(billing.charged_datetime);
-- 5. What query would you run to get total revenue of each client every month per year? Order it by client id.
-- SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client_name, SUM(billing.amount) AS total_revenue, MONTHNAME(billing.charged_datetime) AS month, YEAR(billing.charged_datetime) AS year
-- FROM billing
-- LEFT JOIN clients ON clients.client_id = billing.client_id
-- GROUP BY year, month, clients.client_id
-- ORDER BY clients.client_id;
-- 6. What query would you run to get which sites generated leads between March 15, 2011 to April 15, 2011?
-- SELECT sites.domain_name, COUNT(leads.leads_id) AS number_of_leads
-- FROM leads
-- LEFT JOIN sites ON sites.site_id = leads.site_id
-- WHERE DATE_FORMAT(leads.registered_datetime,"%Y-%m-%d") BETWEEN "2011-03-15" AND "2011-04-15"
-- GROUP BY sites.domain_name;
-- 7. What query would you run to show all the site owners, the site name(s), and the total number of leads 
-- generated from each site for all time?
-- SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client_name, sites.domain_name AS domain_name, COUNT(leads.leads_id) FROM
-- sites
-- LEFT JOIN clients ON clients.client_id = sites.client_id
-- LEFT JOIN leads ON leads.site_id = sites.site_id
-- GROUP BY client_name, domain_name;
-- 8. What query would you run to get a list of site owners who had leads, and the total of each for the whole 2012?
-- SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client_name, COUNT(leads.leads_id) FROM
-- sites
-- LEFT JOIN clients ON clients.client_id = sites.client_id
-- LEFT JOIN leads ON leads.site_id = sites.site_id
-- WHERE YEAR(leads.registered_datetime) = "2012"
-- GROUP BY client_name;
-- 9. What query would you run to get a list of site owners and the total # of leads we've generated for each 
-- owner per month for the first half of Year 2012?
-- SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client_name, COUNT(leads.leads_id) AS total_leads, MONTH(leads.registered_datetime) AS month
-- FROM sites
-- LEFT JOIN clients ON clients.client_id = sites.client_id
-- LEFT JOIN leads ON leads.site_id = sites.site_id
-- WHERE YEAR(leads.registered_datetime) = 2012 AND MONTH(leads.registered_datetime) BETWEEN 1 AND 6
-- GROUP BY client_name, month
-- ORDER BY MONTH(leads.registered_datetime); 
-- 10. Write a single query that retrieves all the site names that each client owns and its total count. Group the 
-- results so that each row shows a new client. (Tip: use GROUP_CONCAT)
SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client_name, COUNT(sites.site_id) as number_of_sites, GROUP_CONCAT(sites.domain_name) as sites
FROM sites
LEFT JOIN clients ON clients.client_id = sites.client_id
GROUP BY clients.client_id
ORDER BY clients.client_id; 

