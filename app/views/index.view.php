<?php require('partials/head.php'); ?>
<header>
    <h1>Welcome</h1>
</header>

<p>This is the home page.</p>

<h2>Project</h2>
<ul>
    <?php foreach ($projects as $project) : ?>
    <?php foreach ($project as $key => $value) : ?>
        <li><?= $key; ?> => <?= $value; ?></li>
        <?php endforeach; ?>
    <?php endforeach; ?>
</ul>

<?php require('partials/footer.php'); ?>
