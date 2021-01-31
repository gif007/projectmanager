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
                    <option value="Inactive">Inactive</option>
                    <option value="On hold">On hold</option>
                    <option value="Active">Active</option>
                    <option value="Review">Review</option>
                    <option value="Completed">Completed</option>
                </select>
            </li>

            <li>
                <label for="assigned_to">Assigned to:</label>
                <select id="assigned_to" name="assigned_to">
                    <option value="Joey">Joey</option>
                    <option value="Sue">Sue</option>
                    <option value="Roger">Roger</option>
                    <option value="Barbara">Barbara</option>
                    <option value="Tony">Tony</option>
                    <option value="Amy">Amy</option>
                    <option value="Steve">Steve</option>
                    <option value="Carol">Carol</option>
                </select>
            </li>
        
            <li>
                <button type="submit" id="createProject">Submit</button>
            </li>
            </ul>
    </fieldset>
</form>

<?php require('partials/footer.php'); ?>
