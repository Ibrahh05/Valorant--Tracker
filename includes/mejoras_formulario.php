<?php
// Archivo: mejoras_formulario.php
// Se asume que ya existe conexión a la base de datos (si no, inclúyela aquí)

function conectar_db() {
    static $db;
    if (!$db) {
        $db = new mysqli('localhost', 'root', '', 'valorant_tracker');
        if ($db->connect_error) {
            die("Error de conexión: " . $db->connect_error);
        }
    }
    return $db;
}

/**
 * Muestra un datalist con los nombres existentes (búsqueda rápida)
 */
function datalist_nombres() {
    $db = conectar_db();
    $res = $db->query("SELECT nombre FROM contacto ORDER BY nombre");
    echo '<datalist id="nombres">';
    while ($row = $res->fetch_assoc()) {
        echo "<option value='" . htmlspecialchars($row['nombre']) . "'>";
    }
    echo '</datalist>';
}

/**
 * Muestra el select de roles (repuebla si hay POST)
 */
function select_rol($rol_actual = '') {
    $roles = ['Duelista', 'Centinela', 'Controlador', 'Iniciador'];
    echo '<select name="rol">';
    echo '<option value="">-- Selecciona rol --</option>';
    foreach ($roles as $r) {
        $sel = ($rol_actual === $r) ? 'selected' : '';
        echo "<option value='$r' $sel>$r</option>";
    }
    echo '</select>';
}

/**
 * Muestra resumen de agentes por rol (count agrupado)
 */
function resumen_por_rol() {
    $db = conectar_db();
    $res = $db->query("SELECT rol, COUNT(*) AS total FROM contacto GROUP BY rol");
    echo "<h3>Resumen por rol:</h3><ul>";
    while ($row = $res->fetch_assoc()) {
        echo "<li><strong>{$row['rol']}:</strong> {$row['total']} agentes</li>";
    }
    echo "</ul>";
}
?>
