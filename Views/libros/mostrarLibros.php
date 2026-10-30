<h2>Catálogo de libros</h2>

<?php if (!isset($libros) || count($libros) === 0): ?>
    <p>No hay libros para mostrar</p>
<?php else: ?>
    <p>Libros mostrados: <?= count($libros) ?></p>
    <?php foreach ($libros as $libro): ?>
        <p>
            Título: <?= htmlspecialchars($libro->getTitulo()) ?> ·
            Autor: <?= htmlspecialchars($libro->getAutor()) ?> ·
            Año: <?= $libro->getAnio() ?>
        </p>
    <?php endforeach; ?>
    <p><a href="?controller=pdf&action=generar" target="_blank">Generar PDF</a></p>
<?php endif; ?>
