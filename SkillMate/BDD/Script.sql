CREATE DATABASE skillmate;

CREATE TABLE Profil (
  Profile_ID INT AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(255) NOT NULL,
  Prenom VARCHAR(255) NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Telephone VARCHAR(255) NOT NULL,
  Datenaissance DATE NOT NULL,
  Genre ENUM('Homme', 'Femme') NOT NULL,
  Pseudo VARCHAR(255) NOT NULL,
  Bio TEXT NOT NULL,
  Lien TEXT,
  NomLien VARCHAR(255),
  Password VARCHAR(255) NOT NULL, 
  Localisation VARCHAR(255) NOT NULL,
  Role ENUM('Créateur', 'ChefEquipe', 'Membre', 'UserSimple', 'Admin') NOT NULL DEFAULT 'UserSimple'
);

CREATE TABLE Projet (
  Projet_ID INT AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(255) NOT NULL,
  Createur VARCHAR(255) NOT NULL,
  Description TEXT NOT NULL,
  DateCreation VARCHAR(255) NOT NULL,
  Domaine VARCHAR(255) NOT NULL,
  StatutProjet BOOLEAN NOT NULL,
  Budget INT NOT NULL,
  Localite VARCHAR(255) NOT NULL
);

CREATE TABLE Contact (
  ContactID INT AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(255) NOT NULL,
  Sujet VARCHAR(255) NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Message TEXT NOT NULL
);

CREATE TABLE ReponseFormulaire (
  ReponseID INT AUTO_INCREMENT PRIMARY KEY,
  reponse VARCHAR(255),
  Projet_ID INT NOT NULL,
  DateSoumission DATE NOT NULL,
  Profile VARCHAR(255) NOT NULL,
  Profile_ID INT,
  FOREIGN KEY (Projet_ID) REFERENCES Projet (Projet_ID) ON DELETE CASCADE,
  FOREIGN KEY (Profile_ID) REFERENCES Profil (Profile_ID)
);


CREATE TABLE Signalement (
  SignalementID INT AUTO_INCREMENT PRIMARY KEY,
  Pseudo VARCHAR(255) NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Feedback TEXT NOT NULL,
  Profile_ID INT NOT NULL,
  FOREIGN KEY (Profile_ID) REFERENCES Profil (Profile_ID) ON DELETE CASCADE
);

CREATE TABLE Questionnaire (
  QuestionnaireID INT AUTO_INCREMENT PRIMARY KEY,
  field_name VARCHAR(255),
  DateCreation DATE NOT NULL,
  NumQuestion INT NOT NULL,
  Projet_ID INT NOT NULL,
  FOREIGN KEY (Projet_ID) REFERENCES Projet (Projet_ID) ON DELETE CASCADE
);

CREATE TABLE Tache (
  TacheID INT AUTO_INCREMENT PRIMARY KEY,
  Intitule VARCHAR(255) NOT NULL,
  Secteur VARCHAR(255) NOT NULL,
  Description TEXT NOT NULL,
  DateCreation VARCHAR(255) NOT NULL,
  DateDebut DATE NOT NULL,
  DateFin DATE NOT NULL,
  Statut VARCHAR(255) NOT NULL,
  Classification VARCHAR(255) NOT NULL,
  Projet_ID INT,
  FOREIGN KEY (Projet_ID) REFERENCES Projet (Projet_ID) ON DELETE CASCADE
);

  
CREATE TABLE LikeProjet (
  Like_ID INT AUTO_INCREMENT PRIMARY KEY,
  Profile_ID INT,
  Projet_ID INT,
  FOREIGN KEY (Profile_ID) REFERENCES Profil (Profile_ID) ON DELETE CASCADE,
  FOREIGN KEY (Projet_ID) REFERENCES Projet (Projet_ID) ON DELETE CASCADE,
  UNIQUE (Profile_ID, Projet_ID)
);


CREATE TABLE AffectationTache (
  Affectation_ID INT AUTO_INCREMENT PRIMARY KEY,
  Profile_ID INT NOT NULL,
  TacheID INT NOT NULL,
  DateAffectation VARCHAR(255) NOT NULL,
  Pseudo VARCHAR(255) NOT NULL,
  Projet_ID INT NOT NULL,
  FOREIGN KEY (Profile_ID) REFERENCES Profil (Profile_ID),
  FOREIGN KEY (TacheID) REFERENCES Tache (TacheID),
  FOREIGN KEY (Projet_ID) REFERENCES Projet (Projet_ID) ON DELETE CASCADE
);

CREATE TABLE MembreProjet (
  MembreProjet_ID INT AUTO_INCREMENT PRIMARY KEY,
  Projet_ID INT,
  Profile_ID INT,
  Pseudo VARCHAR (255) NOT NULL,
  FOREIGN KEY (Projet_ID) REFERENCES Projet (Projet_ID)ON DELETE CASCADE,
  FOREIGN KEY (Profile_ID) REFERENCES Profil (Profile_ID)
);

CREATE TABLE DemandesProjet (
    id_demande INT AUTO_INCREMENT PRIMARY KEY,
    id_projet INT NOT NULL,
    profile_id INT NOT NULL,
    role_demande VARCHAR(255) NOT NULL,
    statut_demande ENUM('En attente', 'Acceptée', 'Refusée') DEFAULT 'En attente',
    date_demande TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_projet) REFERENCES Projet(Projet_ID) ON DELETE CASCADE,
    FOREIGN KEY (profile_id) REFERENCES Profil(Profile_ID)
);

