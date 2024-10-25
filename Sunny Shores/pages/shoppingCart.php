<!-- shoppingCart.php for Sunny Shores -->
<!-- Ben Le -->
<!-- A00454115 -->
<?php
session_start();

$customerID = isset($_SESSION['customer_id'])
    ? $_SESSION['customer_id'] 
    : "";

$productID = isset($_GET['productID'])
    ? $_GET['productID'] 
    : "";

if ($customerID == "")
{
    $_SESSION['purchasePending'] = $productID;
    header("Location: formLogin.php");
}    
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
        <h4 class="w3-center">
            <strong>Your Shopping Cart</strong>
        </h4>
        <?php
        include("../scripts/shoppingCartProcess.php");
        ?>
    </article>
  </main>
  <?php
  include("../common/footer.html");
  ?>
</body>

</html>