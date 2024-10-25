<!-- my_business.php for Sunny Shores -->
<!-- Ben Le -->
<!-- A00454115 -->
<?php
session_start();
include("common/header.html");
?>

<body class="body w3-auto" onload="carousel()">
    <header class="w3-container">
        <?php
        echo '<div class="w3-border w3-border-black w3-sand">';
        include("common/banner.php");
        include("common/menus.html");
        echo '</div>';
        ?>
    </header>
    <main class="w3-container">
        <div class="w3-container w3-border-left w3-border-right 
                            w3-border-black w3-sand" style="padding-right:0">
            <article class="w3-half">
                <h3>
                    Coastal Escape to Summer Style!
                </h3>
                <p>
                    Established in 2024, Sunny Shores was born out of a passion for capturing the essence of summer and
                    the coastal lifestyle.
                    Our journey takes us to beaches, where we explore the vibrant world of fashion and beach essentials.
                    We delve into the sandy shores and azure waves to curate a collection that reflects the spirit of
                    carefree summer days.
                </p>
                <p>
                    Step into our e-store, where summer never ends, and beach memories await.
                    Embrace the sunshine, and let your style shine with Sunny Shores.
                </p>
            </article>
            <?php
            include("resources/images_and_labels.html");
            ?>
        </div>
    </main>
    <?php
    include("common/footer.html");
    ?>
</body>

</html>