<!-- class_schedule.php for Sunny Shores -->
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
      <h3>Class Schedule</h3>
      <p>Here is a list of upcoming classes:</p>
      <dl>
        <dt>Friday, June 14, 2024</dt>
        <dd><b>Beginner Lesson 1:</b> Introduction to basic turning maneuvers and understanding surf equipment and safety protocols.</dd>
        <dt>Saturday, June 15, 2024</dt>
        <dd><b>Intermediate Lesson 1:</b> Introduction to bottom turns and cutbacks and understanding wave selection and
          positioning in the lineup.</dd>
        <dt>Sunday, June 16, 2024</dt>
        <dd><b>Advanced Lesson 1:</b> Surf etiquette and strategy in crowded lineups and introduction to aerial maneuvers and
          tricks.</dd>
      </dl>
      <p>
        All activities will take place at our location at 12 noon, unless otherwise stated on this website at least 24
        hours in advance. Lessons will reoccur on a weekly basis, and further information about the sessions may be posted here.
      </p>
    </article>
  </main>
  <?php
  include("../common/footer.html");
  ?>
</body>

</html>