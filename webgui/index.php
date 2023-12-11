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

$content .= "<script>\n";
$content .= "(function($) {\n";
$content .= "\"use strict\"\n";
$content .= "//basic bar chart\n";
$content .= "const barChart_cwestats = document.getElementById(\"barChart_cwestats\").getContext('2d');\n";
$content .= "barChart_cwestats.height = 100;\n";

$content .= "new Chart(barChart_cwestats, {\n";
$content .= "type: 'bar',\n";
$content .= "data: {\n";
$content .= "defaultFontFamily: 'Poppins',\n";
$content .= "labels: [\"Jan\", \"Feb\", \"Mar\", \"Apr\", \"May\", \"Jun\", \"XXX\", \"TEST\"],\n";
$content .= "datasets: [\n";
$content .= "{\n";
$content .= "label: \"CWE count\",\n";
$content .= "data: [65, 59, 80, 81, 56, 55, 99, 10],\n";
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
$content .= "xAxes: [{\n";
$content .= "// Change here\n";
$content .= "barPercentage: 0.5\n";
$content .= "}]\n";
$content .= "}\n";
$content .= "}\n";
$content .= "});\n";
$content .= "})(jQuery);\n";
$content .= "</script>\n";

echo $header;
echo add_body($content);
echo $footer;

?>