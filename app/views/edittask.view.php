<?php require('partials/head.php'); ?>
<header>
    <h1>Edit Task</h1>
</header>

<form method="post" id="createProject">
    <fieldset>
        <legend>Edit <?= $task->title; ?></legend>
        <ul>
            <li>
                <label for="title">Title:</label>
                <input name="title" id="title" value="<?= $task->title; ?>">
            </li>

            <li>
                <label for="description">Description:</label>
                <textarea name="description" id="description"><?= $task->description; ?></textarea>
            </li>

            <li>
                <label for="type">Type:</label>
                <textarea name="type" id="type"><?= $task->type; ?></textarea>
            </li>

            <li>
                <label for="status">Status:</label>
                <select id="status" name="status">
                <?php foreach(App\Models\Task::status_choices as $status) : ?>
                    <?php if ($task->status == $status) : ?>
                    <option value="<?= $status; ?>" selected><?= $status; ?></option>
                    <?php else : ?>
                    <option value="<?= $status; ?>"><?= $status; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </li>

            <li>
                <label for="assigned_to">Assigned To:</label>
                <select id="assigned_to" name="assigned_to">
                <?php foreach(App\Models\Task::assigned_to_choices as $assigned_to) : ?>
                    <?php if ($task->assigned_to == $assigned_to) : ?>
                    <option value="<?= $assigned_to; ?>" selected><?= $assigned_to; ?></option>
                    <?php else : ?>
                    <option value="<?= $assigned_to; ?>"><?= $assigned_to; ?></option>
                    <?php endif; ?>
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
