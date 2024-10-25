<?php
//time.php
//Return server time in response to an AJAX request
// Ben Le
// A00454115

$date = date("l, F jS");
$time = date('g:ia');
echo "It's $date.<br>
      Our time is $time.";
?>