CREATE TABLE categorie
(
  id  int(11)     NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE news
(
  idNews      int(11)     NOT NULL AUTO_INCREMENT,
  titre       varchar(64) NOT NULL,
  texte       text        NOT NULL,
  pseudo      varchar(25) NOT NULL,
  publication date        NOT NULL,
  expiration  date        DEFAULT NULL,
  categorie   int(11)     NOT NULL,
  PRIMARY KEY (idNews),
  FOREIGN KEY (categorie) REFERENCES categorie(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE utilisateur
(
  pseudo  varchar(25)   NOT NULL,
  mdp     varchar(255)  NOT NULL,
  PRIMARY KEY (pseudo)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO categorie(id, nom) VALUES
(1, 'Enfant'),
(2, 'Adulte'),
(4, 'Senior'),
(6, 'Adolescent');

INSERT INTO news (idNews, titre, texte, pseudo, publication, expiration, categorie) VALUES
(1, 'Le bitcoin', 'Le Bitcoin (BTC) (de l\'anglais bit : unité d\'information binaire et coin « pièce de monnaie ») est une cryptomonnaie autrement appelée monnaie cryptographique.', 'cedric', '2022-03-16', NULL, 2);

INSERT INTO utilisateur (pseudo, mdp) VALUES
('cedric', '$2y$10$2L7KpeXmMlYc.awCd5aXlOaBy2EQOJk.BIAwCAHbl9oqrCuUCGKbG'),
('pierre', '$2y$10$QK3.2jK0NMi5U9VhD6TIm.ljWSe1CC1lELolS86BkGQSf.xmsHrV2');
