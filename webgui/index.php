<?php

include("./include.php");

// intro banner
$content .= "<div class=\"row page-titles mx-0\">\n";
$content .= "<div class=\"col-sm-6\">\n";
$content .= "<div class=\"welcome-text\">\n";
$content .= "<h4>Main Dashboard</h4>\n";
$content .= "<p class=\"mb-0\">Summarized data and charts</p>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "<div class=\"col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex\">\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "<!-- row -->\n";
$content .= "<div class=\"row\">\n";
$content .= "<div class=\"col-12\">\n";

// CWE chart
$content .= "<div class=\"row\">\n";
$content .= "<div class=\"col-lg-6 col-sm-6\">\n";
$content .= "<div class=\"card\">\n";
$content .= "<div class=\"card-header\">\n";
$content .= "<h4 class=\"card-title\">CWE stats</h4>\n";
$content .= "</div>\n";
$content .= "<div class=\"card-body\">\n";
$content .= "<canvas id=\"barChart_test\"></canvas>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

// CVE chart
$content .= "<div class=\"col-lg-6 col-sm-6\">\n";
$content .= "<div class=\"card\">\n";
$content .= "<div class=\"card-header\">\n";
$content .= "<h4 class=\"card-title\">Gradient Bar Chart</h4>\n";
$content .= "</div>\n";
$content .= "<div class=\"card-body\">\n";
$content .= "<canvas id=\"barChart_2\"></canvas>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "<!--**********************************\n";
$content .= "Content body end\n";
$content .= "***********************************-->\n";

$content .= "<!--**********************************\n";
$content .= "Support ticket button start\n";
$content .= "***********************************-->\n";

$content .= "<!--**********************************\n";
$content .= "Support ticket button end\n";
$content .= "***********************************-->\n";

$content .= "</div>\n";
$content .= "<!--**********************************\n";
$content .= "Main wrapper end\n";
$content .= "***********************************-->\n";

$content .= "<!--**********************************\n";
$content .= "Scripts\n";
$content .= "***********************************-->\n";
$content .= "<!-- Required vendors -->\n";
$content .= "<script src=\"./vendor/global/global.min.js\"></script>\n";
$content .= "<script src=\"./js/quixnav-init.js\"></script>\n";
$content .= "<script src=\"./js/custom.min.js\"></script>\n";

$content .= "<!-- Chart ChartJS plugin files -->\n";
$content .= "<script src=\"./vendor/chart.js/Chart.bundle.min.js\"></script>\n";

// $content .= "<script src=\"./mychart/chart_dashboard_cwe.js\"></script>\n";
$content .= "<script>\n";
$content .= "(function($) {\n";
$content .= "\"use strict\"\n";
$content .= "const barChart_1 = document.getElementById(\"barChart_test\").getContext('2d');\n";
$content .= "barChart_1.height = 100;\n";
$content .= "new Chart(barChart_1, {\n";
$content .= "type: 'bar',\n";
$content .= "data: {\n";
$content .= "defaultFontFamily: 'Poppins',\n";

$content .= "labels: [\"Jan\", \"Feb\", \"Mar\", \"Apr\", \"May\", \"Jun\", \"Jul\", \"TEST\"],\n";

$content .= "datasets: [\n";
$content .= "{\n";
$content .= "label: \"My First dataset\",\n";
$content .= "data: [65, 59, 80, 81, 56, 55, 40, 99],\n";
$content .= "borderColor: 'rgba(26, 51, 213, 1)',\n";
$content .= "borderWidth: \"0\",\n";
$content .= "backgroundColor: 'rgba(26, 51, 213, 1)'\n";
$content .= "}\n";
$content .= "]\n";

$content .= "},\n";
$content .= "options: {\n";
$content .= "legend: false,\n"; 
$content .= "scales: {\n";
$content .= "yAxes: [{\n";
$content .= "ticks: {\n";
$content .= "beginAtZero: true\n";
$content .= "}\n";
$content .= "}],\n";
$content .= "xAxes: [{ barPercentage: 0.5 }]\n";
$content .= "}\n";
$content .= "}\n";
$content .= "});\n";
$content .= "})(jQuery);\n";
$content .= "</script>\n";

echo $header;
echo add_body($content);
echo $footer;

?>