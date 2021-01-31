<?php require('partials/head.php'); ?>
<header>
    <h1>Edit Project</h1>
</header>

<form method="post" id="createProject">
    <fieldset>
        <legend>Edit <?= $project->title; ?></legend>
        <ul>
            <li>
                <label for="title">Title:</label>
                <input name="title" id="title" value="<?= $project->title; ?>">
            </li>

            <li>
                <label for="client">Client:</label>
                <input name="client" id="client" value="<?= $project->client; ?>">
            </li>

            <li>
                <label for="quote">Quote:</label>
                <input name="quote" id="quote" value="<?= $project->quote; ?>">
            </li>

            <li>
                <label for="description">Description:</label>
                <textarea name="description" id="description"><?= $project->description; ?></textarea>
            </li>

            <li>
                <label for="comments">Comments:</label>
                <textarea name="comments" id="comments"><?= $project->comments; ?></textarea>
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
                <label for="department">Department:</label>
                <select id="department" name="department">
                    <option value="Estimating">Estimating</option>
                    <option value="Design">Design</option>
                    <option value="Manufacture">Manufacture</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </li>
        
            <li>
                <button type="submit" id="createProject">Submit</button>
            </li>
            </ul>
    </fieldset>
</form>

<?php require('partials/footer.php'); ?>
