<?php require('partials/head.php'); ?>
<header>
    <h1>Project Details</h1>
</header>

<div class='projects'>
    <a id="editlink" href=<?= $project->getEditProjectURL(); ?>>Edit</a>
    <p><?= $project->title; ?></p>
    <p><?= $project->status; ?></p>
    <p><?= $project->getTimestamp(); ?></p>
    <p><?= $project->description; ?></p>
    <p><?= $project->client; ?></p>
    <h2>Tasks:</h2>
    <ul>
    <?php foreach ($project->getTasks() as $task) : ?>
        <li>Title: <?= $task->title; ?></li>
        <li>Status: <?= $task->status; ?></li>
        <li>Assigned to: <?= $task->assigned_to; ?></li>
    <?php endforeach; ?>
    </ul>
    <a href=<?= $project->getAddTaskURL(); ?>>Create New Task</a>
</div>

<?php require('partials/footer.php'); ?>
