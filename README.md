# Sistema-cadastro-pessoas
Pequeno sistema de cadastro e visualização de dados em PHP.

#Tabela utilizada no sistema:

CREATE TABLE pessoas(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50) not null,
    telefone varchar(50) not null,
    email varchar(50) not null
);
