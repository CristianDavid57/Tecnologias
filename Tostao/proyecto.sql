drop database Proyecto;
create database Proyecto;
use Proyecto;
create table usuario (
NoUserId int primary key auto_increment ,
Nombre varchar (100),
Apellido varchar(100),
Direccion varchar(255),
Celular varchar(255),
Edad int,
Email varchar(255),
Usuario varchar (255),
contrasena varchar (255));
create table producto (
idproducto int primary key,
NombreProducto varchar(255),
FechaCaducidad date,
imagenes blob
)

select * from usuario;
select * from producto;