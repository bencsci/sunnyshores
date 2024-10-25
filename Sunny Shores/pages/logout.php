<!-- logout.php for Sunny Shores-->
<!-- Ben Le -->
<!-- A00454115 -->
<?php

session_start();
$loggedInAtStartOfLogout = isset($_SESSION['customer_id']) ? true : false;
if ($loggedInAtStartOfLogout) {
    $customerID = $_SESSION['customer_id'];
    include("../scripts/connectToDatabase.php");
    include("../scripts/logoutProcess.php");
    session_unset();
    session_destroy();
}
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
            <h4>Logout</h4>
            <?php
            if ($loggedInAtStartOfLogout) echo
            '<p>Thank you for visiting our e-store.<br>
                You have successfully logged out.</p>
            <p>If you do wish to log in,
                <a href="pages/formLogin.php">click here</a>.
            </p>
            <p>To browse our product catalog,
                <a href="pages/catalog.php">click here</a>.
            </p>';
            else echo
            '<p>Thank you for visiting Sunny Shores.
                You have not yet logged in.</p>
             <p>If you do wish to log in,
                <a href="pages/formLogin.php">click here</a>.
            </p>
            <p>Or you can browse our product catalog without logging in by
                <a href="pages/catalog.php">clicking here</a>.
            </p>'
            ?>
        </article>
    </main>

    <?php
    include("../common/footer.html");
    ?>
</body>

</html>