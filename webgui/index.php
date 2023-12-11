<?php

include("./include.php");

// intro banner
$content  = "<div class=\"row page-titles mx-0\">\n";
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
$content .= "<canvas id=\"barChart_cwe\"></canvas>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

// CVE chart
$content .= "<div class=\"col-lg-6 col-sm-6\">\n";
$content .= "<div class=\"card\">\n";
$content .= "<div class=\"card-header\">\n";
$content .= "<h4 class=\"card-title\">CVE stats</h4>\n";
$content .= "</div>\n";
$content .= "<div class=\"card-body\">\n";
$content .= "<canvas id=\"barChart_cve\"></canvas>\n";
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

/* BEGIN CWE DATA */
$content .= "<script>\n";
$content .= "(function($) {\n";
$content .= "\"use strict\"\n";
$content .= "const barChart_1 = document.getElementById(\"barChart_cwe\").getContext('2d');\n";
$content .= "barChart_1.height = 100;\n";
$content .= "new Chart(barChart_1, {\n";
$content .= "type: 'bar',\n";
$content .= "data: { defaultFontFamily: 'Poppins',\n";
// generate list of label
$content .= "labels: [ ";
$sql_cweChart = "SELECT cwe FROM `cwe_stats` ORDER BY id";
$result = $mysqli->query($sql_cweChart);
while($row = $result->fetch_assoc())
{
    $content .= "\"" . $row["cwe"] . "\", ";
}
$content .= "],\n";
$content .= "datasets: [{ label: \"CWE count\",\n";
// generate data
$content .= "data: [ ";
$sql_cweChart = "SELECT cwe_count FROM `cwe_stats` ORDER BY id";
$result = $mysqli->query($sql_cweChart);
while($row = $result->fetch_assoc())
{
    $content .= $row["cwe_count"] . ", ";
}
$content .= "],\n";

$content .= "borderColor: 'rgba(26, 51, 213, 1)',\n";
$content .= "borderWidth: \"0\",\n";
$content .= "backgroundColor: 'rgba(26, 51, 213, 1)'\n";
$content .= "}]},\n";
$content .= "options: { legend: false, scales: { yAxes: [{ ticks: { beginAtZero: true } }], xAxes: [{ barPercentage: 0.5 }] } } }); })(jQuery);\n";
$content .= "</script>\n";
/* END CWE DATA */

/* BEGIN CVE DATA */
$content .= "<script>\n";
$content .= "(function($) {\n";
$content .= "\"use strict\"\n";
$content .= "const barChart_2 = document.getElementById(\"barChart_cve\").getContext('2d');\n";
$content .= "barChart_2.height = 100;\n";
$content .= "new Chart(barChart_2, {\n";
$content .= "type: 'bar',\n";
$content .= "data: { defaultFontFamily: 'Poppins',\n";
// generate list of label
$content .= "labels: [ ";
$sql_cveChart = "SELECT date_published FROM `cve_stats` ORDER BY id DESC LIMIT 0, 15";
$result = $mysqli->query($sql_cveChart);
while($row = $result->fetch_assoc())
{
    $content .= "\"" . $row["date_published"] . "\", ";
}
$content .= "],\n";
$content .= "datasets: [{ label: \"CVE count\",\n";
// generate data
$content .= "data: [ ";
$sql_cveChart = "SELECT cve_count FROM `cve_stats` ORDER BY id DESC LIMIT 0, 15";
$result = $mysqli->query($sql_cveChart);
while($row = $result->fetch_assoc())
{
    $content .= $row["cve_count"] . ", ";
}
$content .= "],\n";

$content .= "borderColor: 'rgba(26, 51, 213, 1)',\n";
$content .= "borderWidth: \"0\",\n";
$content .= "backgroundColor: 'rgba(26, 51, 213, 1)'\n";
$content .= "}]},\n";
$content .= "options: { legend: false, scales: { yAxes: [{ ticks: { beginAtZero: true } }], xAxes: [{ barPercentage: 0.5 }] } } }); })(jQuery);\n";
$content .= "</script>\n";
/* END CVE DATA */

echo $header;
echo add_body($content);
echo $footer;

?>