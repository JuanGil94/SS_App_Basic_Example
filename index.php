<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pruebas de Usuarios</title>
    <style>
        .mensaje {
  background-color: #dff0d8;
  color: #3c763d;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #d6e9c6;
  border-radius: 4px;
}

    body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #f4f6f8;
  margin: 0;
  padding: 20px;
}

h2 {
  color: green;
  margin-top: 40px;
}

form {
  background-color: #ffffff;
  padding: 20px;
  margin-bottom: 30px;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  max-width: 400px;
}

input, button {
  display: block;
  width: 100%;
  margin-bottom: 15px;
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

button {
  background-color: green;
  color: white;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: green;
}
  </style>

</head>
<body>
    <?php
session_start();
if (isset($_SESSION['mensaje'])) {
    echo "<div class='mensaje'>" . htmlspecialchars($_SESSION['mensaje']) . "</div>";
    unset($_SESSION['mensaje']);
}
?>

  <h2>Insertar Usuario</h2>
  <form method="post" action="backend.php">
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="number" name="perfil_id" placeholder="ID Perfil" required><br>
    <button type="submit" name="accion" value="insertar">Insertar</button>
  </form>

  <h2>Actualizar Usuario</h2>
  <form method="post" action="backend.php">
    <input type="number" name="id" placeholder="ID Usuario" required><br>
    <input type="text" name="nombre" placeholder="Nuevo Nombre"><br>
    <input type="email" name="email" placeholder="Nuevo Email"><br>
    <input type="number" name="perfil_id" placeholder="Nuevo ID Perfil"><br>
    <button type="submit" name="accion" value="actualizar">Actualizar</button>
  </form>

  <h2>Eliminar Usuario</h2>
  <form method="post" action="backend.php">
    <input type="number" name="id" placeholder="ID Usuario" required><br>
    <button type="submit" name="accion" value="eliminar">Eliminar</button>
  </form>
</body>
</html>