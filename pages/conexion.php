<?php
$servername="localhost";
$username="root";
$password="";

try{
    $conexion=new PDO("mysql:host=$servername",$username,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $SQL="CREATE DATABASE IF NOT EXISTS bdTransporte;
        USE bdTransporte;
        CREATE TABLE IF NOT EXISTS roles(
            ID INT AUTO_INCREMENT PRIMARY KEY,
            NOMBRE_ROL VARCHAR(100) NOT NULL
        );

        INSERT INTO roles(NOMBRE_ROL)
        SELECT 'admi'
        WHERE NOT EXISTS(SELECT 1 FROM roles WHERE NOMBRE_ROL = 'admi');

        INSERT INTO roles(NOMBRE_ROL)
        SELECT 'conductor'
        WHERE NOT EXISTS(SELECT 1 FROM roles WHERE NOMBRE_ROL = 'conductor');


        CREATE TABLE IF NOT EXISTS admi(
            ID INT PRIMARY KEY NOT NULL ,
            NOMBRE VARCHAR(100) NOT NULL,
            CLAVE VARCHAR(100) NOT NULL,
            ROL INT NOT NULL,
            FOREIGN KEY(ROL) REFERENCES roles (ID)
        );
        CREATE TABLE IF NOT EXISTS conductores(
            ID INT PRIMARY KEY NOT NULL,
            NOMBRE VARCHAR(100) NOT NULL,
            CLAVE VARCHAR(100) NOT NULL,
            ROL INT NOT NULL DEFAULT 2,
            FOREIGN KEY(ROL) REFERENCES roles (ID)
        );
        CREATE TABLE IF NOT EXISTS rutas(
            ID INT AUTO_INCREMENT PRIMARY KEY,
            NOMBRE_RUTA VARCHAR(100) NOT NULL
        );
        CREATE TABLE IF NOT EXISTS registro(
            ID INT AUTO_INCREMENT PRIMARY KEY,
            IDCONDUCTOR INT NOT NULL,
            IDRUTA INT NOT NULL,
            HORAINICIO DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            HORAFINAL DATETIME DEFAULT NULL,
            MINUTOSTOTAL INT DEFAULT NULL,
            FOREIGN KEY(IDCONDUCTOR) REFERENCES conductores (ID),
            FOREIGN KEY(IDRUTA) REFERENCES rutas (ID)
        );
    ";
    $conexion->exec($SQL);
}catch(PDOException $e){
    echo "Error".$e->getMessage();
}
?>