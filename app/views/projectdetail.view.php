<?php require('partials/head.php'); ?>
<header>
    <h1>Project Details</h1>
</header>

<div class='projects'>
    <p><?= $project->title; ?></p>
    <p><?= $project->status; ?></p>
    <p><?= $project->getTimestamp(); ?></p>
    <p><?= $project->description; ?></p>
    <p><?= $project->client; ?></p>
</div>

<?php require('partials/footer.php'); ?>
