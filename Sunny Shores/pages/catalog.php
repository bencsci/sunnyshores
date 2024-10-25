<!-- catalog.php for Sunny Shores -->
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
    include("../scripts/connectToDatabase.php");
    echo '</div>';
    ?>
  </header>
  <main class="w3-container">
    <article class="w3-container w3-border-left w3-border-right
                 w3-border-black w3-sand">
        <h4>
            Complete List of Product Categories
        </h4>
        <?php
        include("../scripts/catalogProcess.php");
        ?>

    </article>
  </main>
  <?php
  include("../common/footer.html");
  ?>
</body>

</html>