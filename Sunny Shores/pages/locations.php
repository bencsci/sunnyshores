<!-- locations.php for Sunny Shores -->
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
      <h3>Our Locations</h3>
      <p>
        As our company expands, we intend to expand globally, thus we will ultimately give a list of all of our retail
        locations. Each location will be accompanied by contact information and a link to a map that will show you how
        to locate us there.
      <p>
        In the meantime, here are a few details (just address and telephone number) for our current (and only) location,
        should you wish to drop by:
      </p>
      <p>
        Sunny Shores, LLC.<br>
        567 Ocean Avenue<br>
        Sunhaven, FL<br>
        USA 32123<br>
        Tel: 555.987.6543
      </p>
    </article>
  </main>
  <?php
  include("../common/footer.html");
  ?>
</body>

</html>