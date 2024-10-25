<!-- class_info.php for Sunny Shores -->
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
      <h3>Surfing Lesson Information</h3>
      <p>
        Discover the thrill of surfing with Sunny Shores! Our expert-led surf classes cater to all skill levels,
        offering a safe and exhilarating experience. Join us for a ride on the waves, where every lesson brings you
        closer to mastering the art of surfing and embracing the beach lifestyle.
      </p>
      <ul>
        <li>Beginner Lessons
          <ul>
            <li>Learn essential safety protocols and surf etiquette.</li>
            <li>Build confidence catching and riding small waves.</li>
          </ul>
        </li>
        <li>Intermediate Lessons
          <ul>
            <li>Advance your skills with experienced instructors.</li>
            <li>Learn advanced wave selection and positioning strategies.</li>
          </ul>
        </li>
        <li>Advanced Lessons
          <ul>
            <li>Elevate your surfing to new heights with seasoned experts.</li>
            <li>Master advanced maneuvers, including aerial tricks.</li>
          </ul>
        </li>
      </ul>
    </article>
  </main>
  <?php
  include("../common/footer.html");
  ?>
</body>

</html>