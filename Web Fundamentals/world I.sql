USE world;
-- 1. Get all the list of countries that are in the continent of Europe.
-- SELECT *
-- FROM country
-- WHERE continent = 'Europe';
-- 2. Get all the list of countries that are in the continent of North America and Africa.
-- SELECT *
-- FROM country
-- WHERE continent IN ('North America', 'Africa');
-- 3. Get all the list of cities that are part of a country with a population greater than 100 million.
-- SELECT city.CountryCode as country_code, city.name as country_name, 
-- continent, country.Population as country_population, city.name as city
-- FROM city
-- LEFT JOIN country
-- ON city.CountryCode = Country.Code
-- WHERE country.population > 100000000;
-- 4. Get all the list of countries (display the full country name) who speak 'Spanish' as their language
-- SELECT country.Name, countrylanguage.Language FROM country 
-- LEFT JOIN countrylanguage 
-- ON country.Code = countrylanguage.CountryCode
-- WHERE countrylanguage.Language = 'Spanish';
-- 5. Get all the list of countries (display the full country name) who speak 'Spanish' as their official language
-- SELECT country.Name, countrylanguage.Language FROM country 
-- LEFT JOIN countrylanguage 
-- ON country.Code = countrylanguage.CountryCode
-- WHERE countrylanguage.Language = 'Spanish' AND countrylanguage.isOfficial = 'T';
-- 6. Get all the list of countries (display the full country name) who speak either 'Spanish' or 'English' as their official language
-- SELECT country.Name, countrylanguage.Language FROM country 
-- LEFT JOIN countrylanguage 
-- ON country.Code = countrylanguage.CountryCode
-- WHERE countrylanguage.Language IN ('Spanish', 'English') AND countrylanguage.isOfficial = 'T';
-- 7. Get all the list of countries (display the full country name) where 'Arabic' is spoken by more than 30% of the population but where it's not the country's official language.
-- SELECT country.Name, countrylanguage.Language, countrylanguage.percentage, countrylanguage.isOfficial FROM country 
-- LEFT JOIN countrylanguage 
-- ON country.Code = countrylanguage.CountryCode
-- WHERE countrylanguage.Language = "Arabic" AND countrylanguage.percentage > 30 AND countrylanguage.isOfficial = 'F';
-- 8.  Get all the list of countries (display the full country name) where 'French' is the official language but where less than 50% of the population in that country actually speaks that language.
-- SELECT country.Name, countrylanguage.Language, countrylanguage.percentage, countrylanguage.isOfficial FROM country 
-- LEFT JOIN countrylanguage 
-- ON country.Code = countrylanguage.CountryCode
-- WHERE countrylanguage.Language = "French" AND countrylanguage.percentage < 50 AND countrylanguage.isOfficial = 'T';
-- 9. Get all the list of countries (display the full country name and the full language name) and their official language.  Order the result so that those with the same official language are shown together.
-- SELECT country.Name as country, countrylanguage.language, countrylanguage.isofficial 
-- FROM country 
-- LEFT JOIN countrylanguage
-- ON country.Code = countrylanguage.CountryCode
-- WHERE countrylanguage.isOfficial = 'T'
-- ORDER BY countrylanguage.language;
-- 10. Get the top 100 cities with the most population.  Display the city's full country name as well as their official language.
-- SELECT country.name as country, city.name as city, countrylanguage.language as language, countrylanguage.isofficial
-- FROM city
-- LEFT JOIN country
-- ON country.code = city.CountryCode
-- LEFT JOIN countrylanguage
-- ON city.CountryCode = countrylanguage.countrycode
-- WHERE countrylanguage.isofficial = 'T'
-- ORDER BY city.population DESC LIMIT 100;
-- 11. Get the top 100 cities with the most population where the life_expectancy for the country is less than 40.
-- SELECT country.name as country, city.name as city, country.LifeExpectancy as lifeexpectancy
-- FROM country
-- LEFT JOIN city
-- ON country.code = city.CountryCode
-- WHERE country.LifeExpectancy < 40
-- ORDER BY city.population DESC LIMIT 100;
-- Get the top 100 countries who speak English and where life expectancy is highest.  Show the country with the highest life expectancy first.
SELECT country.name as country, city.name as city, country.LifeExpectancy as lifeexpectancy
FROM country
LEFT JOIN city 
ON country.code = city.CountryCode
LEFT JOIN countrylanguage
ON countrylanguage.CountryCode = country.code
WHERE countrylanguage.language = "English"
ORDER BY country.LifeExpectancy DESC LIMIT 100;
