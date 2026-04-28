CREATE DATABASE IF NOT EXISTS kuharji CHARACTER SET utf8mb4 COLLATE utf8mb4_slovenian_ci;
USE kuharji;

DROP TABLE IF EXISTS komentarji;
DROP TABLE IF EXISTS recepti_sestavine;
DROP TABLE IF EXISTS recepti;
DROP TABLE IF EXISTS sestavine;
DROP TABLE IF EXISTS uporabniki;

CREATE TABLE uporabniki (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uporabnisko_ime VARCHAR(50) NOT NULL UNIQUE,
  geslo VARCHAR(255) NOT NULL,
  eposta VARCHAR(100) NOT NULL UNIQUE,
  profilna_slika VARCHAR(255) NULL,
  ustvarjen DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

CREATE TABLE recepti (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uporabnik_id INT NOT NULL,
  naslov VARCHAR(150) NOT NULL,
  opis TEXT NULL,
  navodila TEXT NOT NULL,
  slika VARCHAR(255) NULL,
  kategorija VARCHAR(80) NULL,
  ustvarjen DATETIME DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_recepti_uporabniki FOREIGN KEY (uporabnik_id) REFERENCES uporabniki(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

CREATE TABLE sestavine (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ime VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

CREATE TABLE recepti_sestavine (
  id INT AUTO_INCREMENT PRIMARY KEY,
  recept_id INT NOT NULL,
  sestavina_id INT NOT NULL,
  kolicina VARCHAR(80) NULL,
  CONSTRAINT fk_rs_recepti FOREIGN KEY (recept_id) REFERENCES recepti(id) ON DELETE CASCADE,
  CONSTRAINT fk_rs_sestavine FOREIGN KEY (sestavina_id) REFERENCES sestavine(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

CREATE TABLE komentarji (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uporabnik_id INT NOT NULL,
  recept_id INT NOT NULL,
  vsebina TEXT NOT NULL,
  ustvarjen DATETIME DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_komentarji_uporabniki FOREIGN KEY (uporabnik_id) REFERENCES uporabniki(id) ON DELETE CASCADE,
  CONSTRAINT fk_komentarji_recepti FOREIGN KEY (recept_id) REFERENCES recepti(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

INSERT INTO uporabniki (uporabnisko_ime, geslo, eposta, profilna_slika) VALUES
('nina', '$2y$10$primerhash', 'nina@example.com', NULL),
('marko', '$2y$10$primerhash', 'marko@example.com', NULL),
('ana', '$2y$10$primerhash', 'ana@example.com', NULL);

INSERT INTO sestavine (ime) VALUES
('testenine'), ('paradižnik'), ('bazilika'), ('sir'), ('jajca'), ('moka'), ('mleko'), ('piščanec'), ('riž'), ('limona');

INSERT INTO recepti (uporabnik_id, naslov, opis, navodila, slika, kategorija) VALUES
(1, 'Poletne testenine z baziliko', 'Svež, hiter recept za kosilo med tednom.', 'Skuhaj testenine. Na olju pogrej paradižnik, dodaj baziliko in vse skupaj premešaj. Na koncu dodaj sir.', 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?auto=format&fit=crop&w=1200&q=80', 'Kosilo'),
(2, 'Palačinke za leno nedeljo', 'Mehke palačinke, ki jih lahko napolniš s sladkim ali slanim nadevom.', 'Zmešaj jajca, moko in mleko. Speci tanke palačinke na vroči ponvi.', 'https://images.unsplash.com/photo-1528207776546-365bb710ee93?auto=format&fit=crop&w=1200&q=80', 'Sladice'),
(3, 'Limonin piščanec z rižem', 'Enostavna večerja z veliko okusa.', 'Piščanca začini, popeci, dodaj limonin sok in postrezi z rižem.', 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?auto=format&fit=crop&w=1200&q=80', 'Večerja');

INSERT INTO komentarji (uporabnik_id, recept_id, vsebina) VALUES
(2, 1, 'Top recept, ful hitro narejeno.'),
(1, 2, 'Tole vedno uspe.'),
(3, 1, 'Dodala sem še malo čilija, brutalno dobro.');
