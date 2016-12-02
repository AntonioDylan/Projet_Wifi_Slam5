CREATE TABLE  port_etudiant  (
  num  int(11) NOT NULL AUTO_INCREMENT,
  numGroupe  int(11) DEFAULT NULL,
  nom  char(32) NOT NULL,
  prenom  char(32) NOT NULL,
  mel  char(64) NOT NULL,
  mdp  char(32) NOT NULL,
  numexam  char(16) DEFAULT NULL,
  valide  char(1) NOT NULL DEFAULT 'O',
 PRIMARY KEY ( num ),
 KEY  ietudgrou  ( numGroupe )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  port_professeur  (
  num  int(11) NOT NULL AUTO_INCREMENT,
  nom  char(32) NOT NULL,
  prenom  char(32) NOT NULL,
  mel  char(64) NOT NULL,
  mdp  char(32) NOT NULL,
  niveau  int(11) NOT NULL,
  valide  char(1) DEFAULT 'O',
 PRIMARY KEY ( num )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE  adresse_mac  (
  id  int(11) NOT NULL AUTO_INCREMENT,
  numEtudiant  char(32) NOT NULL,
  libelle  char(32) NOT NULL,
  addr  char(12) NOT NULL,
 PRIMARY KEY ( num ),
 FOREIGN KEY (numEtudiant) REFERENCES port_etudiant(num)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;