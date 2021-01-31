  <nav>
    <?php if (isset($_SESSION['username'])) : ?>

    <ul>
      <li><a href='/'>My Projects</a></li>
      <li><a href='/search'>Search</a></li>
      <li><a href='/archive'>Archive</a></li>
      <li><a href='/create/project'>Create Project</a></li>
      <li><a href='/about'>About</a></li>
      <li id='logout'><a href='/logout'>Logout</a></li>
      <li id='user'>User: <?= strtoupper($_SESSION['username']); ?></li>
    </ul>
    
    <?php endif; ?>
  </nav>
