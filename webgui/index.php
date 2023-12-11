<?php

include("./include.php");

// intro banner
$content  = "<div class=\"row page-titles mx-0\">\n";
$content .= "<div class=\"col-sm-6\">\n";
$content .= "<div class=\"welcome-text\"><h4>Main Dashboard</h4><p class=\"mb-0\">Data summary and stats.</p></div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

// chart: CVE timeline
$content .= "<div class=\"row\">\n";
$content .= "<div class=\"col-12\">\n";
$content .= "<div class=\"row\">\n";

$content .= "<div class=\"col-lg-6 col-sm-6\">\n";
$content .= "<div class=\"card\">\n";
$content .= "<div class=\"card-header\"><h4 class=\"card-title\">CWE stats</h4></div>\n";
$content .= "<div class=\"card-body\"><canvas id=\"barChart_cwestats\"></canvas></div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

$content .= "<div class=\"col-lg-6 col-sm-6\">\n";
$content .= "<div class=\"card\">\n";
$content .= "<div class=\"card-header\"><h4 class=\"card-title\">Gradient Bar Chart</h4></div>\n";
$content .= "<div class=\"card-body\"><canvas id=\"barChart_2\"></canvas></div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

$content .= "<!-- Chart ChartJS plugin files -->\n";
$content .= "<script src=\"./vendor/chart.js/Chart.bundle.min.js\"></script>\n";
$content .= "<script src=\"./mychart/chart_dashboard_cwe.js\"></script>\n";

echo $header;
echo add_body($content);
echo $footer;

?>