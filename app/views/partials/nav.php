  <nav>
    <?php if (isset($_SESSION['username'])) : ?>

    <ul>
      <li><a href='/'>My Projects</a></li>
      <li><a href='/'>Search</a></li>
      <li><a href='/'>Archive</a></li>
      <li><a href='/'>Create Project</a></li>
      <li><a href='/'>About</a></li>
      <li id='logout'><a href='/logout'>Logout</a></li>
      <li id='user'>User: <?= $_SESSION['username']; ?>(ID:<?= $_SESSION['userid']; ?>)</li>
    </ul>
    
    <?php endif; ?>
  </nav>