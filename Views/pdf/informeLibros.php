<h2>Informe de libros</h2>

<?php if (!isset($libros) || count($libros) === 0): ?>
    <p>No hay libros para mostrar</p>
<?php else: ?>
    <p>Libros encontrados: <?= count($libros) ?></p>
    <?php foreach ($libros as $libro): ?>
        <p>Libro: <?= htmlspecialchars($libro->getFicha()) ?> Año: <?= $libro->getAnio() ?></p>
    <?php endforeach; ?>
<?php endif; ?>
