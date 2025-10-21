<?php
// Formulario enviado
$is_post = $_SERVER['REQUEST_METHOD'] === 'POST';

// Campos y errores
$e = [];
$nombre = trim($_POST['nombre'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$rol = trim($_POST['rol'] ?? '');

// Conjunto de roles permitidos
$roles_permitidos = ['admin', 'editor', 'usuario'];

// Validaciones
if ($is_post) {
    // Nombre obligatorio y entre 2 y 100 caracteres
    if ($nombre === '' || mb_strlen($nombre) < 2 || mb_strlen($nombre) > 100) {
        $e['nombre'] = 'El nombre debe tener entre 2 y 100 caracteres';
    }

    // Descripción obligatoria y máximo 400 caracteres
    if ($descripcion === '' || mb_strlen($descripcion) > 400) {
        $e['descripcion'] = 'La descripción es obligatoria y máximo 400 caracteres';
    }

    // Rol obligatorio y permitido
    if ($rol === '' || !in_array($rol, $roles_permitidos)) {
        $e['rol'] = 'Seleccione un rol válido';
    }
}

// Función de escape
function esc($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<meta charset="utf-8">
<title>Formulario Seguro</title>
<h1>Formulario de Registro</h1>

<form method="post" novalidate>
    <p>
        Nombre: <input name="nombre" value="<?= esc($nombre) ?>" required>
        <span style="color:red"><?= $e['nombre'] ?? '' ?></span>
    </p>

    <p>
        Descripción:<br>
        <textarea name="descripcion" required><?= esc($descripcion) ?></textarea>
        <span style="color:red"><?= $e['descripcion'] ?? '' ?></span>
    </p>

    <p>
        Rol:
        <select name="rol" required>
            <option value="">--Seleccione--</option>
            <?php foreach ($roles_permitidos as $r): ?>
                <option value="<?= esc($r) ?>" <?= $rol === $r ? 'selected' : '' ?>><?= esc($r) ?></option>
            <?php endforeach; ?>
        </select>
        <span style="color:red"><?= $e['rol'] ?? '' ?></span>
    </p>

    <button>Enviar</button>
</form>

<?php if ($is_post && !$e): ?>
    <h2>Datos recibidos:</h2>
    <ul>
        <li><strong>Nombre:</strong> <?= esc($nombre) ?></li>
        <li><strong>Descripción:</strong> <?= esc($descripcion) ?></li>
        <li><strong>Rol:</strong> <?= esc($rol) ?></li>
    </ul>
<?php endif; ?>
