<!-- competitions.php for Sunny Shores -->
<!-- Ben Le -->
<!-- A00454115 -->
<?php
session_start();
include("../common/header.html");
?>

<body class="body w3-auto">
  <header class="w3-container">
    <?php
    echo '<div class="w3-border w3-border-black w3-sand">';
    include("../common/banner.php");
    include("../common/menus.html");
    echo '</div>';
    ?>
  </header>
  <main class="w3-container">
    <article class="w3-container w3-border-left w3-border-right
                     w3-border-black w3-sand">
      <h3>Surf Competitions</h3>
      <p>
        Ride the waves of excitement at Sunny Shores' Surf Competition, where surfers of all levels are invited to
        showcase their skills and seize the chance to win fantastic cash prizes and exclusive Sunny Shores merchandise.
      <dl>
        <dt>Saturday, August 24, 2024 |🟩🟨</dt>
        <dd><b>Breakthrough Challenge:</b> Join us for a day of sun, sea, and surf as you ride the waves, break through
          barriers, and compete for recognition and exclusive prizes at Sunny Shores.
        </dd>
        <dt>Saturday, August 31, 2024 |🟥</dt>
        <dd>
          <b>Sunrise Surf Slam:</b>
          Join us for a spectacular sunrise spectacle at the Sunrise Surf Slam, where elite surfers
          navigate challenging waves, demonstrating mastery of the ocean, and compete for prestige and exclusive rewards
          at Sunny Shores.
        </dd>
      </dl>
      <p>
        The coloured squares represent the needed skill levels for each competition. Green is beginner, yellow is
        intermediate, and red is advanced. As we hold more competitions, they will be included here.
      </p>
    </article>
  </main>
  <?php
  include("../common/footer.html");
  ?>
</body>

</html>