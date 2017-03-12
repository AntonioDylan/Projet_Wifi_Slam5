-- Les deux tables de base nécéssaire au projet
-- Table Etudiant
create table `port_etudiant` (
	`num` int(11) not null auto_increment,
	`numGroupe` int(11) DEFAULT null,
	`nom` char(32) not null,
	`prenom` char(32) not null,
	`mel` char(64) not null,
	`mdp` char(32) not null,
	`numexam` char(16) not null,
	`valide` char(1) not null default 'O',
	primary key (`num`),
	key `ietudgrou` (`numGroupe`)
) ENGINE=InnoDB default charset=utf8;

-- Table Professeur
create table `port_professeur` (
	`num` int(11) not null auto_increment,
	`nom` char(32) not null,
	`prenom` char(32) not null,
	`mel` char(64) not null,
	`mdp` char(32) not null,
	`niveau` int(11) not null,
	`valide` char(1) default 'O',
	primary key (`num`)
) ENGINE=InnoDB default charset=utf8;

