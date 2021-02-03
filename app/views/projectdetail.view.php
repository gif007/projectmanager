<?php require('partials/head.php'); ?>
<header>
    <h1>Project Details</h1>
</header>

<div class='projects'>

    <h2>Project</h2>
    <table class='projectDetail'>
        
        <tr class='header'>
            <th>Title</th>
            <td><?= $project->title; ?></td>
        </tr>

        <tr>
            <th>Date Created</th>
            <td colspan=2><?= $project->getTimestamp(); ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <td colspan=2><?= $project->status; ?></td>
        </tr>

        <tr>
            <th>Client</th>
            <td colspan=2><?= $project->client; ?></td>
        </tr>

        <tr>
            <th>Quote</th>
            <td colspan=2>$<?= $project->quote; ?>.00</td>
        </tr>

        <tr>
            <th>Department</th>
            <td colspan=2><?= $project->department; ?></td>
        </tr>

        <tr>
            <th>Description</th>
            <td colspan=2><?= $project->description; ?></td>
        </tr>

        <tr>
            <th>Comments</th>
            <td colspan=2><?= $project->comments; ?></td>
        </tr>

        <tr>
            <?php if($_SESSION['userid'] == $project->created_by) : ?>
                <th colspan=3 id='editlink'><a href=<?= $project->getEditProjectURL(); ?>>Edit</a></th>
            <?php endif; ?>
        </tr>

    </table>
    

    <h2>Tasks</h2>
    <?php foreach ($project->getTasks() as $task) : ?>
        <table class='projectDetail'>
        
        <tr class='header'>
            <th>Title</th>
            <td><?= $task->title; ?></td>
        </tr>

        <tr>
            <th>Date Created</th>
            <td colspan=2><?= $task->getTimestamp(); ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <td colspan=2><?= $task->status; ?></td>
        </tr>

        <tr>
            <th>Assigned To</th>
            <td colspan=2><?= $task->assigned_to; ?></td>
        </tr>

        <tr>
            <th>Type</th>
            <td colspan=2><?= $task->type; ?></td>
        </tr>

        <tr>
            <th>Description</th>
            <td colspan=2><?= $task->description; ?></td>
        </tr>

        <tr>
            <?php if($_SESSION['userid'] == $project->created_by) : ?>
                <th colspan=3 id='editlink'><a href=<?= $task->getEditURL(); ?>>Edit</a></th>
            <?php endif; ?>
        </tr>

    </table>

    <?php endforeach; ?>
    <?php if($_SESSION['userid'] == $project->created_by) : ?>
        <a href=<?= $project->getAddTaskURL(); ?>>Create New Task</a>
    <?php endif; ?>
    
</div>

<?php require('partials/footer.php'); ?>
