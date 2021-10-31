<?php include __DIR__ . '/../inicio-html.php'; ?>

    <a href="/api/novo-curso" class="btn btn-primary mb-2">
        Novo curso
    </a>
    <ul class="list-group">

        <?php
        if (isset($cursos)):
            foreach ($cursos as $curso): ?>
                <li class="list-group-item">
                    <?= $curso->getDescricao(); ?>
                </li>
            <?php
            endforeach;
        endif;
        ?>
    </ul>

<?php include __DIR__ . '/../fim-html.php'; ?>