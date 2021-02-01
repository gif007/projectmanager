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
                <input name="title" id="title" value="<?= $project->title; ?>" maxlength=50>
            </li>

            <li>
                <label for="client">Client:</label>
                <input name="client" id="client" value="<?= $project->client; ?>" maxlength=100>
            </li>

            <li>
                <label for="quote">Quote:</label>
                <input name="quote" id="quote" value="<?= $project->quote; ?>">
            </li>

            <li>
                <label for="description">Description:</label>
                <textarea name="description" id="description" maxlength=100><?= $project->description; ?></textarea>
            </li>

            <li>
                <label for="comments">Comments:</label>
                <textarea name="comments" id="comments"><?= $project->comments; ?></textarea>
            </li>

            <li>
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <?php foreach(['Inactive', 'On hold', 'Active', 'Review', 'Completed'] as $status) : ?>
                    <?php if ($project->status == $status) : ?>
                    <option value="<?= $status; ?>" selected><?= $status; ?></option>
                    <?php else : ?>
                    <option value="<?= $status; ?>"><?= $status; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </li>

            <li>
                <label for="department">Department:</label>
                <select id="department" name="department">
                <?php foreach(['Estimating', 'Design', 'Manufacture', 'Marketing'] as $department) : ?>
                    <?php if ($project->department == $department) : ?>
                    <option value="<?= $department; ?>" selected><?= $department; ?></option>
                    <?php else : ?>
                    <option value="<?= $department; ?>"><?= $department; ?></option>
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
