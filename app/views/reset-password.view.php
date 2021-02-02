<?php require('partials/head.php'); ?>
<header>
    <h1>Reset Password</h1>
</header>

<?php if (isset($message)) : ?>
<p><?= $message; ?></p>
<?php endif; ?>

<form method='post'>
<fieldset>
<legend>Reset Password</legend>
    <ul>
        <li>
        <label for='oldpassword'>Current Password:</label>
        <input type='password' name='oldpassword' id='oldpassword'>
        </li>

        <li>
        <label for='newpassword'>New Password:</label>
        <input type='password' name='newpassword' id='newpassword'>
        </li>

        <li>
        <label for='newpassword2'>New Password (Again):</label>
        <input type='password' name='newpassword2' id='newpassword2'>
        </li>

        <li>
        <button type='submit' id='submitPasswordReset'>Submit</button>
        </li>
    </ul>
    </fieldset>
</form>


<?php require('partials/footer.php'); ?>
