CREATE DATABASE seguirdad;
CREATE TABLE perfiles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL
);

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  perfil_id INT,
  FOREIGN KEY (perfil_id) REFERENCES perfiles(id)
);
