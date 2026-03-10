------------------------------------------------
-- TABLE USERS
------------------------------------------------

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    pseudo VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

------------------------------------------------
-- TABLE FILMS
------------------------------------------------

CREATE TABLE films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    realisateur VARCHAR(255),
    annee INT,
    duree INT,
    synopsis TEXT,
    affiche VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

------------------------------------------------
-- TABLE GENRES
------------------------------------------------

CREATE TABLE genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL
);

------------------------------------------------
-- TABLE DE LIAISON FILM_GENRE
------------------------------------------------

CREATE TABLE film_genre (
    film_id INT,
    genre_id INT,
    PRIMARY KEY (film_id, genre_id),

    FOREIGN KEY (film_id)
        REFERENCES films(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    FOREIGN KEY (genre_id)
        REFERENCES genres(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

------------------------------------------------
-- DONNEES DE TEST
------------------------------------------------

INSERT INTO genres (nom) VALUES
('Action'),
('Science-fiction'),
('Comédie'),
('Drame'),
('Thriller');

INSERT INTO films (titre, realisateur, annee, duree, synopsis, affiche)
VALUES
('Man of Steel','Zack Snyder',2013,143,
'Jor-El, depuis Krypton, décide d\envoyer son fils Kal-El sur la planète Terre pour sauver sa race.',
'man_of_steel.jpg'),
('The Dark Knight','Christopher Nolan',2008,152,
'Batman affronte le Joker qui sème le chaos à Gotham.',
'dark_knight.jpg'),
('Interstellar','Christopher Nolan',2014,169,
'Une équipe explore un trou de ver pour sauver l’humanité.',
'interstellar.jpg'),
('Pulp Fiction','Quentin Tarantino',1994,154,
'Une odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood',
'pulp_fiction.jpg'),
('La guerre des Mondes','Steven Spielberg',2005,116,
'La terre se fend, laissant apparaître La première phase d\une attaque massive d\extraterrestres.',
'la_guerre_des_mondes.jpg'),
('Le seigneur des anneaux','Peter Jackson',2001,178,
'Un jeune et timide hobbit, Frodon Sacquet, hérite d\un anneau magique.',
'le_segneur_des_annneaux.jpg');

------------------------------------------------
-- ASSOCIATION FILM / GENRE
------------------------------------------------

INSERT INTO film_genre VALUES
(1,2),
(1,5),
(2,1),
(2,5),
(3,2),
(3,4),
(4,1),
(4,5),
(5,2),
(5,3),
(6,1),
(6,2);