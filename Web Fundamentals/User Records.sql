USE hackerhero_practice;

-- INSERT INTO users (first_name, last_name, email, encrypted_password, created_at, updated_at) VALUES ('John', 'Doe', 'johndoe@example.com', 'password', NOW(), NOW());
-- INSERT INTO users (first_name, last_name, email, encrypted_password, created_at, updated_at) VALUES ('Jane', 'Doe', 'janedoe@example.com', 'password', NOW(), NOW());
-- INSERT INTO users (first_name, last_name, email, encrypted_password, created_at, updated_at) VALUES ('Bob', 'Smith', 'bobsmith@example.com', 'password', NOW(), NOW());

-- UPDATE users SET first_name = 'Bubo' WHERE id = 1;

-- SET SQL_SAFE_UPDATES = 0;
-- UPDATE users SET last_name = 'Choi' WHERE true;
-- SET SQL_SAFE_UPDATES = 1;

-- UPDATE users SET first_name = "Michael" WHERE id IN (3, 5, 7, 12, 19);

-- DELETE from users WHERE id = 1;

-- SET SQL_SAFE_UPDATES = 0;
-- DELETE from users;
-- SET SQL_SAFE_UPDATES = 1;

DROP TABLE users; 

SELECT * FROM users;