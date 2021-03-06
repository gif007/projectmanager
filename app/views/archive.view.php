<?php require('partials/head.php'); ?>
<header>
    <h1>Archives</h1>
</header>

<div class='projects'>
    <?php if (sizeof($projects) == 0) : ?>
    <p>The project database is currently empty.</p>
    
    <?php else : ?>
        <?php foreach($projects as $project) : ?>
            <table class='project-card'>
                <tr class='header'>
                    <th>Title</th><th>Status</th>
                </tr>
                <tr>
                    <td><a href=<?= $project->getURL(); ?>><?= $project->title; ?></a></td>
                    <td><?= $project->status; ?></td>
                </tr>
                <tr class='header'>
                    <th colspan=2>Description</th>
                </tr>
                <tr>
                    <td colspan=2><?= $project->description; ?></td>
                </tr>
                <tr class='header'>
                    <th>Created By</th>
                    <th>Date Created</th>
                </tr>
                <tr>
                    <td><?= ucwords($project->getUser()); ?></td>
                    <td><?= $project->getTimeStamp(); ?></td>
                </tr>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require('partials/footer.php'); ?>
