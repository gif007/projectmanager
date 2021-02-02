<?php require('partials/head.php'); ?>
<header>
    <h1>My Projects</h1>
</header>

<div class='projects'>
    <?php if (sizeof($projects) == 0) : ?>
    <p>You currently do not have any projects.</p>
    
    <?php else : ?>
        <?php foreach($projects as $project) : ?>
            <table class='project-card'>
                <tr class='header'>
                    <th>Title</th><th>Date Created</th>
                </tr>
                <tr>
                    <td><a href=<?= $project->getURL(); ?>><?= $project->title; ?></a></td><td><?= $project->getTimeStamp(); ?></td>
                </tr>
                <tr class='header'>
                    <th colspan=2>Description</th>
                </tr>
                <tr>
                    <td colspan=2><?= $project->description; ?></td>
                </tr>
                <tr class='header'>
                    <th>Status</th><th>Department</th>
                </tr>
                <tr>
                    <td><?= $project->status; ?></td><td><?= $project->department; ?></td>
                </tr>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require('partials/footer.php'); ?>
