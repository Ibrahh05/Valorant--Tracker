
<!doctype html>
<meta charset="utf-8">
<title>Paso 6</title>
<h1>Paso 6 – Validaciones con filter_var()</h1>

<form method="post" novalidate>
    <p>
        id: <input name="id" value="<?= esc($id) ?>">
        <span style="color:red"><?= $e['id'] ?? '' ?></span>
    </p>

	<p>
		nombre:
		<input name="nombre" list="nombres" value="<?= esc($nombre) ?>">
		<?php datalist_nombres(); ?>
		<span style="color:red"><?= $e['nombre'] ?? '' ?></span>
	</p>

	<p>
		rol:
		<?php select_rol($rol); ?>
		<span style="color:red"><?= $e['rol'] ?? '' ?></span>
	</p>


    <p>
        habilidad_firma: <input name="habilidad_firma" value="<?=$habilidad_firma = ""; // Valor por defecto
		 esc($habilidad_firma) ?>">
        <span style="color:red"><?= $e['habilidad_firma'] ?? '' ?></span>
    </p>

    <p>
        descripcion:<br>
        <textarea name="coment"><?= esc($descripcion) ?></textarea>
        <span style="color:red"><?= $e['descripcion'] ?? '' ?></span>
    </p>

    <button>Enviar</button>
</form>

<?php if ($is_post && !$e): ?>
    <h2>Datos recibidos correctamente:</h2>
    <ul>
        <li><strong>Usuario:</strong> <?= esc($usuario) ?></li>
        <li><strong>Nombre:</strong> <?= esc($nombre) ?></li>
        <li><strong>Email:</strong> <?= esc($email) ?></li>
        <li><strong>Edad:</strong> <?= esc($edad) ?></li>
        <li><strong>Comentario:</strong> <?= esc($coment) ?></li>
    </ul>
<?php endif; ?>
