USE world;
-- 1. How many countries in each continent, have the life expectancy greather than 70?
-- SELECT country.continent as continent, COUNT(*) as total_countries, AVG(country.LifeExpectancy) AS lifeexpectancy
-- FROM country 
-- WHERE country.LifeExpectancy > 70
-- GROUP BY country.continent;
-- 2. How many countries in each continent have a life expectancy between 60 and 70?
-- SELECT country.continent as continent, COUNT(*) as total_countries, AVG(country.LifeExpectancy) AS lifeexpectancy
-- FROM country
-- WHERE country.LifeExpectancy BETWEEN 60 and 70
-- GROUP BY country.continent;
-- 3. How many countries have life expectancy greater than 75?
-- SELECT country.Name, country.LifeExpectancy FROM country
-- WHERE country.LifeExpectancy > 75;
-- 4. How many countries have life expectancy less than 40?
-- SELECT country.Name, country.LifeExpectancy FROM country
-- WHERE country.LifeExpectancy < 40;
-- 5. How many people live in the top 10 countries with most population?
-- SELECT country.Name, country.Population FROM country
-- ORDER BY country.Population DESC LIMIT 10;
-- 6. According to the world database, how many people are there in the world?
-- SELECT SUM(country.Population) FROM country;
-- 7. Show results for continents where it shows the continent name and the total population. Only show results where the 
-- total_population for the continent is more than 500,000,000. If the continent doesn't have 500,000,000 people, do not SHOW the result
-- SELECT country.continent as continent, SUM(country.population) as total_population
-- FROM country
-- GROUP BY country.continent
-- HAVING total_population > 500000000;
-- 8. Show results of all continents that have an average life expectancy for the continent to be less than 71.  
-- Show each of these continent name, how many countries there are in each of the continents, 
-- the total population for the continent, as well as the life expectancy of this continent.  
-- For example, as Europe and North America both have continent life expectancy greater than 71, 
-- these continents shouldn't show up in your sql results.
-- SELECT country.continent, COUNT(*), SUM(country.population) as total_population, AVG(country.LifeExpectancy) as life_expectancy 
-- FROM country
-- GROUP BY country.continent
-- HAVING life_expectancy < 71;

-- 1. How many cities are there for each of the coutnry? Show the total city count for each coutnry where you display the full ocountry name
-- SELECT country.Name, COUNT(city.Name) as number_of_cities
-- FROM city
-- LEFT JOIN country ON country.Code = city.CountryCode 
-- GROUP BY country.Code
-- ORDER BY country.Name
-- 2. For each language, find out how many countries speak each language.
-- SELECT countrylanguage.Language, COUNT(country.Code) as number_of_countries
-- FROM countrylanguage
-- LEFT JOIN country ON country.Code = countrylanguage.CountryCode
-- GROUP BY countrylanguage.Language;
-- 3. For each language, find out how many countries use that language as the official language.
-- SELECT countrylanguage.language, COUNT(country.code), countrylanguage.IsOfficial 
-- FROM countrylanguage
-- LEFT JOIN country ON country.Code = countrylanguage.CountryCode
-- WHERE countrylanguage.IsOfficial = "T"
-- GROUP BY countrylanguage.Language;
-- 4. For each continent, find out how many cities there are (according to this database) and the average population
-- of the cities for each continent. For example, for continent A, have it state the number of cities for that 
-- continent, and the average city population for that continent.
-- SELECT country.Continent, COUNT(city.countryCode) AS total_cities, AVG(city.population) AS average_cities_population
-- FROM country
-- LEFT JOIN city ON country.Code = city.CountryCode
-- GROUP BY country.Continent; 
-- 5. (Advanced) Find out how many people in the world speak each language.  Make sure the total sum of. this number is comparable to the total population in the world.
SELECT countrylanguage.Language, SUM(country.Population) AS total_population
FROM countrylanguage
JOIN country ON country.Code = countrylanguage.CountryCode
GROUP BY countrylanguage.Language
ORDER BY total_population DESC;
	