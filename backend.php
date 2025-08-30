<?php
session_start(); // Para usar mensajes temporales

// Conexión
$pdo = new PDO('mysql:host=localhost;dbname=seguridad;charset=utf8mb4', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

function redirigirConMensaje($mensaje) {
    $_SESSION['mensaje'] = $mensaje;
    header("Location: index.php");
    exit;
}

try {
    $accion = $_POST['accion'] ?? '';
    if ($accion === 'insertar') {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, perfil_id) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['nombre'], $_POST['email'], $_POST['perfil_id']]);
        redirigirConMensaje("Usuario insertado correctamente.");
    } elseif ($accion === 'actualizar') {
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre = ?, email = ?, perfil_id = ? WHERE id = ?");
        $stmt->execute([$_POST['nombre'], $_POST['email'], $_POST['perfil_id'], $_POST['id']]);
        redirigirConMensaje("Usuario actualizado.");
    } elseif ($accion === 'eliminar') {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$_POST['id']]);
        redirigirConMensaje("Usuario eliminado.");
    } else {
        redirigirConMensaje("Acción no reconocida.");
    }
} catch (Exception $e) {
    redirigirConMensaje("Error: " . $e->getMessage());
}