<?php require('partials/head.php'); ?>
<header>
    <h1>Create New Project</h1>
</header>

<form method="post" id="createProject">
    <fieldset>
        <legend>Create Project</legend>
        <ul>
            <li>
                <label for="title">Title:</label>
                <input name="title" id="title" maxlength=50>
            </li>

            <li>
                <label for="client">Client:</label>
                <input name="client" id="client" maxlength=100>
            </li>

            <li>
                <input type="hidden" name="created_by" id="userID" value=<?= $_SESSION['userid']; ?>>
            </li>

            <li>
                <label for="quote">Quote:</label>
                <input name="quote" id="quote">
            </li>

            <li>
                <label for="description">Description:</label>
                <textarea name="description" id="description" maxlength=100></textarea>
            </li>

            <li>
                <label for="comments">Comments:</label>
                <textarea name="comments" id="comments"></textarea>
            </li>

            <li>
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <?php foreach(App\Models\Project::status_choices as $status) : ?>
                    <option value="<?= $status; ?>"><?= $status; ?></option>
                    <?php endforeach; ?>
                </select>
            </li>

            <li>
                <label for="department">Department:</label>
                <select id="department" name="department">
                <?php foreach(App\Models\Project::department_choices as $department) : ?>
                    <option value="<?= $department; ?>"><?= $department; ?></option>
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
