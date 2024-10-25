<!-- banner.html -->
<!-- Ben Le -->
<!-- A00454115 -->
<div id="logo" class="w3-half">
    <img src="images/SunnyShoresLogo.png" alt="logo" style="width:100%">
</div>

<div class="w3-half w3-right-align">
    <div class="w3-panel">
        <?php

        $loggedIn = isset($_SESSION['customer_id']) ? true : false;
        if (isset($_SESSION['customer_id']))
            $customerID = $_SESSION['customer_id'];
        if (isset($_SESSION['salutation']))
            $salutation = $_SESSION['salutation'];
        if (isset($_SESSION['first_name']))
            $firstName = $_SESSION['first_name'];
        if (isset($_SESSION['middle_initial']))
            $middleInitial = $_SESSION['middle_initial'];
        if (isset($_SESSION['last_name']))
            $lastName = $_SESSION['last_name'];
        if (isset($_SESSION['login_name']))
            $loginName = $_SESSION['login_name'];
        if (!$loggedIn)
            echo "<h5>Welcome!</h5>";
        else
            echo "<h6>Welcome, $loginName!<br>
                            $salutation $firstName $middleInitial $lastName
                            </h6>";
        echo "<h6 id='datetime'> It's " . date("l, F jS");
        echo " and our time is " . date('g:ia') . ".</h6>";
        if ($loggedIn)
            echo "<a class='w3-button w3-teal w3-round w3 small' 
                            href='pages/logout.php'>Log out</a>";
        else
            echo "<a class='w3-button w3-teal w3-round w3 small' 
                            href='pages/formLogin.php'>Log in</a>";
        ?>
        <p class="quote w3-left-align">
            <?php
            include($_SERVER['CONTEXT_DOCUMENT_ROOT']
                . "/submissions/submission06"
                . "/scripts/get_quote_from_mongodb.php");
            ?>
        </p>

    </div>
</div>
<script>
    var request = null;

    function getCurrentTime() {
        request = new XMLHttpRequest();
        var url = "scripts/time.php"
        request.open("GET", url, true);
        request.onreadystatechange = updatePage;
        request.send(null);
    }

    function updatePage() {
        if (request.readyState == 4) {
            var dateDisplay = document.getElementById("datetime");
            dateDisplay.innerHTML = request.responseText;
        }
    }

    getCurrentTime();
    setInterval('getCurrentTime()', 60000)
</script>