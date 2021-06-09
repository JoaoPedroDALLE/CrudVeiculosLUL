# Crud-web-02-06
bdcrud

tbclientes
id int(11) (pk, ai)
nome	varchar(80)
sobrenome	varchar(100)
email	varchar(150)
idade	varchar(11)

tbusuario
id int(15) (pk, ai)
nome	varchar(80)
login	varchar(200)
senha	varchar(80)
telefone varchar(15)
foto varchar(250)
datanasc datetime

tbveiculo
id int(11) (pk, ai)
marca varchar(200)
modelo varchar(200)
ano int(11)
cor varchar(200)
placa varchar(8)
motor varchar(100)
km int(11)
valor decimal(10,2)


ALTER TABLE tbusuario
ADD UNIQUE (login)


mudar variavel datanasc no adicinarusu para date (type="date")



