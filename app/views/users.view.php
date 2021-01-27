<?php require('partials/head.php'); ?>
<header>
    <h1>All Users</h1>
</header>

<form method='POST' action='/users'>
  <input name='name'></input>
  <button type='submit'>Submit</button>
</form>

<?php if($names): ?>
    <p>Users:</p>
    <ul id='names'>
        <?php foreach($names as $name): ?>
            <li><strong><?= $name->name; ?></strong></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<script>
    window.onload = function () {
        document.querySelector('input').focus();
    };
</script>
<?php require('partials/footer.php'); ?>