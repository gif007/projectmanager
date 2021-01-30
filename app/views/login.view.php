<?php require('partials/head.php'); ?>
<header>
    <h1>Project Management Solutions</h1>
</header>

<?php if (isset($message)) : ?>
<p id='loginmsg'><?= $message; ?></p>
<?php endif; ?>


<form method='post'>
<fieldset>
<legend>Login</legend>
    <ul>
        <li>
        <label for='username'>Username:</label>
        <input type='text' name='username' id='username'>
        </li>

        <li>
        <label for='password'>Password:</label>
        <input type='password' name='password' id='password'>
        </li>

        <li>
        <button type='submit' id='login'>Login</button>
        </li>
    </ul>
    </fieldset>
</form>
<script>
window.onload = ()=>{
document.querySelector('input#username').focus();
};
</script>
<?php require('partials/footer.php'); ?>
