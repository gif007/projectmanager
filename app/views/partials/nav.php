  <nav>
    <ul>
      <li><a href='/'>My Projects</a></li>
      <!-- <li><a href='/about'>About</a></li>
      <li><a href='/about/culture'>Culture</a></li>
      <li><a href='/contact'>Contact</a></li>
      <li><a href='/users'>Users</a></li> -->
      <?php if (isset($_SESSION['username'])) : ?>
      <li id='logout'><a href='/logout'>Logout</a></li>
      <li id='user'>User: <?= $_SESSION['username']; ?>(ID:<?= $_SESSION['userid']; ?>)</li>
      <?php endif; ?>
    </ul>
  </nav>