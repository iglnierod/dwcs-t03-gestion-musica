CREATE DATABASE musica;
USE musica;

CREATE TABLE artistas(
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  genero VARCHAR(50) NOT NULL,
  anio_debut YEAR
);

INSERT INTO artistas (nombre, genero, anio_debut) VALUES
  ('The Beatles', 'Rock', 1960),
  ('Adele', 'Pop', 2006),
  ('Shakira', 'Pop', 1995);