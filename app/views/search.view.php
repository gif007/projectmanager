<?php require('partials/head.php'); ?>
<header>
    <h1>Search Projects</h1>
</header>

<!-- <?php if (isset($message)) : ?>
<p id='loginmsg'><?= $message; ?></p>
<?php endif; ?> -->

<form method='post' class='search'>
<fieldset>
<legend style='display: none;'>Search</legend>
    <div class='searchfield'>
        <input type='text' name='query' id='query'>
        <button type='submit' id='search'>Search</button>
    </div>
    </fieldset>
</form>

<?php if (isset($result)) : ?>
    <div class='searchfield'>
    <h2>Results:</h2>
    <?php foreach($result as $project) : ?>
            <table class='project-card'>
                <tr class='header'>
                    <th>Title</th><th>Date</th>
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
                    <th>Status</th>
                    <th>Created By</th>
                </tr>
                <tr>
                    <td><?= $project->status; ?></td>
                    <td><?= ucwords($project->getUser()); ?></td>
                </tr>
            </table>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<script>
window.onload = ()=>{
document.querySelector('input#query').focus();
};
</script>

<?php require('partials/footer.php'); ?>
