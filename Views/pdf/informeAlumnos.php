<h2>Informe de alumnos</h2>

<?php if (!isset($alumnos) || count($alumnos) === 0): ?>

    <p>No hay alumnos para mostrar</p>

<?php else: ?>

    <p>Alumnos encontrados: <?= count($alumnos) ?></p>

    <?php foreach ($alumnos as $alumno): ?>
        <p>
            Nombre: <?= $alumno->getNombreCompleto() ?>
            Edad: <?= $alumno->getEdad() ?>
        </p>
    <?php endforeach; ?>

<?php endif; ?>