CREATE TABLE IF NOT EXISTS uporabniki (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uporabnisko_ime VARCHAR(50) NOT NULL UNIQUE,
    geslo VARCHAR(255) NOT NULL,
    eposta VARCHAR(100) NOT NULL UNIQUE,
    profilna_slika VARCHAR(255) DEFAULT NULL,
    ustvarjen DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS recepti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uporabnik_id INT NOT NULL,
    naslov VARCHAR(150) NOT NULL,
    opis TEXT,
    navodila TEXT NOT NULL,
    slika VARCHAR(255) DEFAULT NULL,
    kategorija ENUM('glavna_jed','sladica','pijaca','juha','solata','drugo') DEFAULT 'drugo',
    ustvarjen DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uporabnik_id) REFERENCES uporabniki(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS sestavine (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS recept_sestavine (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recept_id INT NOT NULL,
    sestavina_id INT NOT NULL,
    kolicina VARCHAR(50),
    FOREIGN KEY (recept_id) REFERENCES recepti(id) ON DELETE CASCADE,
    FOREIGN KEY (sestavina_id) REFERENCES sestavine(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS komentarji (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uporabnik_id INT NOT NULL,
    recept_id INT NOT NULL,
    vsebina TEXT NOT NULL,
    ustvarjen DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uporabnik_id) REFERENCES uporabniki(id) ON DELETE CASCADE,
    FOREIGN KEY (recept_id) REFERENCES recepti(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS administratorji (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uporabnik_id INT NOT NULL UNIQUE,
    ustvarjen DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uporabnik_id) REFERENCES uporabniki(id) ON DELETE CASCADE
);