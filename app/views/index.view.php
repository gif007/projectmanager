<?php require('partials/head.php'); ?>
<!-- <header>
    <h1>Submit Your Name</h1>
</header>

<form method='POST' action='/names'>
  <input name='name'></input>
  <button type='submit'>Submit</button>
</form>

<?php if($names): ?>
    <p>Names:</p>
    <ul id='names'>
        <?php foreach($names as $name): ?>
            <li><?= $name->id; ?>. <?= $name->name; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<script>
    window.onload = function () {
        document.querySelector('input').focus();
    };
</script> -->
<header>
    <h1>Welcome</h1>
</header>
<p>This is the home page.</p>
<?php require('partials/footer.php'); ?>