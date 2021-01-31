<?php require('partials/head.php'); ?>
<header>
    <h1>Archives</h1>
</header>

<div class='projects'>
    <?php if (sizeof($projects) == 0) : ?>
    <p>You currently do not have any projects.</p>
    
    <?php else : ?>
        <?php foreach($projects as $project) : ?>
            <table class='project-card'>
                <tr class='header'>
                    <th>Title</th><th>Date</th>
                </tr>
                <tr>
                    <td><a href=<?= $project->getURL(); ?>><?= $project->title; ?></a></td><td><?= $project->getTimeStamp(); ?></td>
                </tr>
                <tr class='header'>
                    <th>Status</th>
                    <th>Created By</th>
                </tr>
                <tr>
                    <td><?= $project->status; ?></td>
                    <td><?= ucwords($project->getUser()); ?></td>
                </tr>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require('partials/footer.php'); ?>
