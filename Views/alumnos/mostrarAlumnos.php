<h2><?= "Mostrar alumnos" ?></h2>


<?php if (!isset($alumnos) || count($alumnos) === 0): ?>
    <p>No hay alumnos para mostrar</p>

<?php else: ?>
    <p>Alumnos mostradas: <?= count($alumnos) ?></p>
        <?php foreach ($alumnos as $alumno): ?>
            <p>
                Nombre: <?= $alumno->getNombreCompleto() ?>
                Edad: <?= $alumno->getEdad() ?>
            </p>

        <?php endforeach; ?>
    <p><a href="?controller=pdf&action=generar" target="_blank">Generar PDF</a></p>
<?php endif; ?>