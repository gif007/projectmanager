  <nav>
    <ul>
      <li><a href='/'>My Projects</a></li>
      <li><a href='/'>Search</a></li>
      <li><a href='/'>Archive</a></li>
      <li><a href='/'>Create Project</a></li>
      <li><a href='/'>About</a></li>

      <?php if (isset($_SESSION['username'])) : ?>
      <li id='logout'><a href='/logout'>Logout</a></li>
      <li id='user'>User: <?= $_SESSION['username']; ?>(ID:<?= $_SESSION['userid']; ?>)</li>
      <?php endif; ?>
    </ul>
  </nav>