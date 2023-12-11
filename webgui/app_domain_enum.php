<?php

include("./include.php");

// intro banner
$content  = "<div class=\"row page-titles mx-0\">\n";
$content .= "<div class=\"col-sm-6\">\n";
$content .= "<div class=\"welcome-text\">\n";
$content .= "<h4>Domain Enumeration</h4>\n";
$content .= "<p class=\"mb-0\"> </p>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "<div class=\"col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex\">\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "<!-- row -->\n";
$content .= "<div class=\"row\">\n";
$content .= "<div class=\"col-12\">\n";

// Target list
$content .= "<div class=\"row\">\n";
$content .= "<div class=\"col-xl-4 col-xxl-6 col-lg-6 col-md-6\">\n";
$content .= "<div class=\"card\">\n";
$content .= "<div class=\"card-header\">\n";
$content .= "<h4 class=\"card-title\">Target list</h4>\n";
$content .= "</div>\n";
$content .= "<div class=\"card-body\">\n";
$content .= "<div class=\"basic-list-group\">\n";
$content .= "<ul class=\"list-group\">\n";
$sql_target = "SELECT * FROM `target` ORDER BY id ASC LIMIT 0, 10";
$result = $mysqli->query($sql_target);
while($row = $result->fetch_assoc())
{
    $content .= "<li class=\"list-group-item\">" . $row["main_domain"] . "</li>\n";
}
$content .= "</ul>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

// Target list
$content .= "<div class=\"row\">\n";
$content .= "<div class=\"col-xl-4 col-xxl-6 col-lg-6 col-md-6\">\n";
$content .= "<div class=\"card\">\n";
$content .= "<div class=\"card-header\">\n";
$content .= "<h4 class=\"card-title\">Target list</h4>\n";
$content .= "</div>\n";
$content .= "<div class=\"card-body\">\n";
$content .= "<div class=\"basic-list-group\">\n";
$content .= "<ul class=\"list-group\">\n";
$sql_target = "SELECT * FROM `target` ORDER BY id ASC LIMIT 0, 10";
$result = $mysqli->query($sql_target);
while($row = $result->fetch_assoc())
{
    $content .= "<li class=\"list-group-item\">" . $row["main_domain"] . "</li>\n";
}
$content .= "</ul>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

// Target list
$content .= "<div class=\"row\">\n";
$content .= "<div class=\"col-xl-4 col-xxl-6 col-lg-6 col-md-6\">\n";
$content .= "<div class=\"card\">\n";
$content .= "<div class=\"card-header\">\n";
$content .= "<h4 class=\"card-title\">Target list</h4>\n";
$content .= "</div>\n";
$content .= "<div class=\"card-body\">\n";
$content .= "<div class=\"basic-list-group\">\n";
$content .= "<ul class=\"list-group\">\n";
$sql_target = "SELECT * FROM `target` ORDER BY id ASC LIMIT 0, 10";
$result = $mysqli->query($sql_target);
while($row = $result->fetch_assoc())
{
    $content .= "<li class=\"list-group-item\">" . $row["main_domain"] . "</li>\n";
}
$content .= "</ul>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";
$content .= "</div>\n";

echo $header;
echo add_body($content);
echo $footer;

?>