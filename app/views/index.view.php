<?php require('partials/head.php'); ?>
<header>
    <h1>My Projects</h1>
</header>

<div class='projects'>
    <?php foreach($projects as $project) : ?>
        <table class='project-card'>
            <tr class='header'>
                <th>Title</th><th>Date</th>
            </tr>
            <tr>
                <td><a href=<?= $project->getURL(); ?>><?= $project->title; ?></a></td><td><?= $project->getTimeStamp(); ?></td>
            </tr>
            <tr class='header'>
                <th colspan=2>Status</th>
            </tr>
            <tr>
                <td colspan=2><?= $project->status; ?></td>
            </tr>
        </table>
    <?php endforeach; ?>
</div>

<?php require('partials/footer.php'); ?>
