INSERT INTO messages (content, UserId) 
VALUES 
('Bonjour', (SELECT iduser FROM users WHERE username = "Cécilius")), 
('mange du pain', (SELECT iduser FROM users WHERE username = "Cécilius")), 
('Pizza time', (SELECT iduser FROM users WHERE username = "Cécilius")), 
('salade niçoise ou rien', (SELECT iduser FROM users WHERE username = "Cécilius")), 
('Vive les regex', (SELECT iduser FROM users WHERE username = "Elzemond")), 
('JS logic', (SELECT iduser FROM users WHERE username = "Elzemond")), 
('Coucou', (SELECT iduser FROM users WHERE username = "Elzemond")), 
('Bonsoir', (SELECT iduser FROM users WHERE username = "Hypolite")), 
('Je fais la loi !', (SELECT iduser FROM users WHERE username = "Hypolite")), 
('Ne regarde pas derrière toi.', (SELECT iduser FROM users WHERE username = "Hypolite")), 
('Connaissez vous les trois coquillages?', (SELECT iduser FROM users WHERE username = "Hypolite")), 
('42', (SELECT iduser FROM users WHERE username = "Hypolite")), 
('salut', (SELECT iduser FROM users WHERE username = "Florestan")), 
('mangez 5 fruits et légumes par jour', (SELECT iduser FROM users WHERE username = "Florestan")); 