<!-- vision.php for Sunny Shores -->
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
      <h3>About Sunny Shores: Our Vision and Mission</h3>
      <p>
        Sunny Shores was born from a shared passion for capturing the essence of summer and the coastal lifestyle.
        As avid travelers and beach enthusiasts, we discovered a plethora of remarkable products that encapsulate the
        carefree spirit and vibrant energy of sunny days by the sea. Our journey inspired the vision to curate a
        collection
        that brings the coastal magic closer to home
      </p>
      <p>
        We recognize that individual tastes vary, but we believe that each item in our collection holds a unique charm
        that contributes to the overall magic of Sunny Shores. Our mission is to bring the spirit of summer into the
        lives of
        our customers, providing them with not just products, but an experience that resonates with the essence of Sunny
        Shores.
      </p>
    </article>
  </main>
  <?php
  include("../common/footer.html");
  ?>
</body>

</html>