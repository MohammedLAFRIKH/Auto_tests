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

CREATE TABLE Article (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ref VARCHAR(50) NOT NULL,
    libelle VARCHAR(255) NOT NULL,
    qteStock INT NOT NULL,
    prixUnitaire DECIMAL(10, 2) NOT NULL
);

CREATE TABLE Facture (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datefact DATE NOT NULL,
    client VARCHAR(255) NOT NULL,
    total DECIMAL(10, 2) NOT NULL
);

CREATE TABLE LigneFacture (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT NOT NULL,
    Qte INT NOT NULL,
    PRIXUnitaire DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (article_id) REFERENCES Article(id) ON DELETE CASCADE
);
