------ Création de la base de données ------

create DATABASE zoo_arcadia;

use zoo_arcadia;

------ Création des tables ------

CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
);

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    roles JSON NOT NULL
);

CREATE TABLE service (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    image_name VARCHAR(255) NOT NULL,
    updated_at DATETIME NOT NULL,
    category_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE habitat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    habitat_remark TEXT,
    image_name VARCHAR(255) NOT NULL,
    updated_at DATETIME NOT NULL,
    area INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE species (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
);

CREATE TABLE animal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    image_name VARCHAR(255) NOT NULL,
    updated_at DATETIME NOT NULL,
    detail TEXT,
    species_id INT NOT NULL,
    habitat_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (species_id) REFERENCES species(id),
    FOREIGN KEY (habitat_id) REFERENCES habitat(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE food (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE feed (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quantity INT NOT NULL,
    date DATETIME NOT NULL,
    animal_id INT NOT NULL,
    food_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animal(id),
    FOREIGN KEY (food_id) REFERENCES food(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE vet_report (
    id INT AUTO_INCREMENT PRIMARY KEY,
    animal_condition VARCHAR(255) NOT NULL,
    food_quantity INT NOT NULL,
    visit_date DATE NOT NULL,
    animal_condition_detail TEXT,
    animal_id INT NOT NULL,
    suggested_food_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animal(id),
    FOREIGN KEY (suggested_food_id) REFERENCES food(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE opening_hours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(50) NOT NULL,
    open VARCHAR(5) NOT NULL,
    close VARCHAR(5) NOT null,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE review (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    is_visible BOOLEAN NOT NULL,
    date DATE NOT null,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);


------ Insertion jeux données ------

-- Insertion vétérinaire avec mdp crypté : secret
INSERT INTO user (firstname, lastname, username, password, roles) 
VALUES ('John', 'Doe', 'johndoe@arcadia.fr', '$2y$10$bOu5Y3SEBvp0iHlksEFdO.hl.mQyIg453tHvCbHfEca3fZyanDW8e', '["ROLE_VET"]');

-- Insertion habitat
INSERT INTO habitat (name, description, habitat_remark, image_name, updated_at, area, user_id) 
VALUES ('Hautes Montagnes', 'Une région élevée avec des pics escarpés et des vallées profondes.', 
		'Zone caractérisée par des altitudes élevées et des conditions climatiques variées.', 
		'montagne.jpg',
		'2024-07-22', 
	     50, 
	     5);

-- Insertion animal
INSERT INTO animal (name, image_name, updated_at, detail, species_id, habitat_id, user_id)
VALUES ('Lion', 'lion.jpg', '2024-07-22', 'Le lion est un grand félin carnivore.', 25, 6, 5);
   
-- Insertion service
INSERT INTO service (name, description, image_name, updated_at, category_id, user_id)
VALUES ('Spectacle de tortues', 'Un spectacle captivant avec des tortues.', 'spectacle.jpg', NOW(), 6, 6);

-- Insertion vet report
INSERT INTO vet_report (animal_condition, food_quantity, visit_date, animal_condition_detail, animal_id, suggested_food_id, user_id)
VALUES 
    ('Bonne santé',
     15,
     '2024-07-22',
     'L’animal semble en bonne forme générale. Aucun problème de santé majeur détecté.',
     33,
     15,
     7
    );

