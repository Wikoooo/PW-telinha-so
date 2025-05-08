Create database Banquino;
Use Banquino;
Create Table Usuarinhos (
    id int Auto_increment Primary key,
    nome VARCHAR (50)   not null,
    email VARCHAR (100) not null,
    senha VARCHAR (32)  not null
)