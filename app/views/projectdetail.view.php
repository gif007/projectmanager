<?php require('partials/head.php'); ?>
<header>
    <h1>Project Details</h1>
</header>

<div class='projects'>
    <a id="editlink" href=<?= $project->getEditProjectURL(); ?>>Edit</a>
    <p>Title: <?= $project->title; ?></p>
    <p>Client: <?= $project->client; ?></p>
    <p>Date Created: <?= $project->getTimestamp(); ?></p>
    <p>Quote: <?= $project->quote; ?></p>
    <p>Description: <?= $project->description; ?></p>
    <p>Comments: <?= $project->comments; ?></p>
    <p>Status: <?= $project->status; ?></p>
    <p>Department: <?= $project->department; ?></p>

    <h2>Tasks:</h2>
    <?php foreach ($project->getTasks() as $task) : ?>
    <ul class='tasklist'>
        <li>Title: <?= $task->title; ?></li>
        <li>Date Started: <?= $task->date_set; ?></li>
        <li>Description: <?= $task->description; ?></li>
        <li>Type: <?= $task->type; ?></li>
        <li>Status: <?= $task->status; ?></li>
        <li>Assigned To: <?= $task->assigned_to; ?></li>
        <li><a href=<?= $task->getEditURL(); ?>>Edit</a></li>
    </ul>
    <?php endforeach; ?>

    <a href=<?= $project->getAddTaskURL(); ?>>Create New Task</a>
</div>

<?php require('partials/footer.php'); ?>
