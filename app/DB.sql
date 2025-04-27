create database test_db;

CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL
      
);

CREATE TABLE `Bonlivraison` (
  `idBonlivraison` int(11) AUTO_INCREMENT PRIMARY KEY,
  `id_client` int(11) NOT NULL,
  FOREIGN KEY (id_client) REFERENCES Users(id) ON DELETE CASCADE
)

CREATE TABLE LigneBonLivraison (
  idLigneBonLivraison INT AUTO_INCREMENT PRIMARY KEY,
  idBonLivraison INT NOT NULL,
  libelle VARCHAR(255) NOT NULL,
  quantite INT NOT NULL,
  FOREIGN KEY (idBonLivraison) REFERENCES Bonlivraison(idBonlivraison) ON DELETE CASCADE
);
