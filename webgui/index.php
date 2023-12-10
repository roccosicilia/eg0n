<?php

include("./include.php");

// intro banner
$content  = "<div class=\"row page-titles mx-0\">\n";
$content .= "<div class=\"col-sm-6\">\n";
$content .= "<div class=\"welcome-text\"><h4>Main Dashboard</h4><p class=\"mb-0\">Data summary and stats.</p></div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

// chart: CVE timeline


echo $header;
echo add_body($content);
echo $footer;

?>