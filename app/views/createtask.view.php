<?php require('partials/head.php'); ?>
<header>
    <h1>Create New Task</h1>
</header>

<form method="post" id="createProject">
    <fieldset>
        <legend>Create Task on <?= $project->title; ?></legend>
        <ul>
            <li>
                <label for="title">Title:</label>
                <input name="title" id="title">
            </li>

            <li>
                <input type="hidden" name="projectId" id="projectId" value=<?= $project->id; ?>>
            </li>

            <li>
                <label for="description">Description:</label>
                <textarea name="description" id="description"></textarea>
            </li>

            <li>
                <label for="type">Type:</label>
                <textarea name="type" id="type"></textarea>
            </li>

            <li>
                <label for="status">Status:</label>
                <select id="status" name="status">
                <?php foreach(App\Models\Task::status_choices as $status) : ?>
                    <option value="<?= $status; ?>"><?= $status; ?></option>
                <?php endforeach; ?>
                </select>
            </li>

            <li>
                <label for="assigned_to">Assigned to:</label>
                <select id="assigned_to" name="assigned_to">
                <?php foreach(App\Models\Task::assigned_to_choices as $assigned_to) : ?>
                    <option value="<?= $assigned_to; ?>"><?= $assigned_to; ?></option>
                <?php endforeach; ?>
                </select>
            </li>
        
            <li>
                <button type="submit" id="createProject">Submit</button>
            </li>
            </ul>
    </fieldset>
</form>

<?php require('partials/footer.php'); ?>
