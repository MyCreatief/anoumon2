<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <script src="https://kit.fontawesome.com/efa49ff73e.js" crossorigin="anonymous" async></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
<header>
  Ánoumon
  <nav>
    <button class="menu-toggle" aria-label="Toggle Menu">
      <span class="menu-toggle-icon"></span>
      <span class="menu-toggle-icon"></span>
      <span class="menu-toggle-icon"></span>
    </button>
      <?php
      // Display the "navigatie" menu
      wp_nav_menu( array(
          'theme_location' => 'navigatie',
          'container' => false,
          'menu_class' => 'navigation-menu',
      ) );
      ?>
  </nav>
</header>

<?php wp_footer(); ?>

<script>
  const menuToggle = document.querySelector('.menu-toggle');
  const navigationMenu = document.querySelector('.navigation-menu');

  menuToggle.addEventListener('click', function() {
    navigationMenu.classList.toggle('open');
  });
</script>

</body>
</html>
