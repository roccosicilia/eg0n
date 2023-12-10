<?php

/**************************************************************************************************
 * DB conn (change database connection data, default is 'egon')
 *************************************************************************************************/
$mysqli = new mysqli('localhost', 'egon', 'egon', 'egon');

/**************************************************************************************************
 * page header 
 *************************************************************************************************/

$header  = "<!DOCTYPE html>\n";
$header .= "<html lang=\"en\">\n";
$header .= "<head>\n";
$header .= "<meta charset=\"utf-8\">\n";
$header .= "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
$header .= "<meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">\n";
$header .= "<title>eg0n dashboard</title>\n";
$header .= "<!-- Favicon icon -->\n";
$header .= "<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"./images/favicon.png\">\n";
$header .= "<link rel=\"stylesheet\" href=\"./vendor/owl-carousel/css/owl.carousel.min.css\">\n";
$header .= "<link rel=\"stylesheet\" href=\"./vendor/owl-carousel/css/owl.theme.default.min.css\">\n";
$header .= "<link href=\"./vendor/jqvmap/css/jqvmap.min.css\" rel=\"stylesheet\">\n";
$header .= "<link href=\"./css/style.css\" rel=\"stylesheet\">\n";
$header .= "</head>\n";

$header .= "<body>\n";
$header .= "<!--*******************\n";
$header .= "Preloader start\n";
$header .= "********************-->\n";
$header .= "<div id=\"preloader\">\n";
$header .= "<div class=\"sk-three-bounce\">\n";
$header .= "<div class=\"sk-child sk-bounce1\"></div>\n";
$header .= "<div class=\"sk-child sk-bounce2\"></div>\n";
$header .= "<div class=\"sk-child sk-bounce3\"></div>\n";
$header .= "</div>\n";
$header .= "</div>\n";
$header .= "<!--*******************\n";
$header .= "Preloader end\n";
$header .= "********************-->\n";

$header .= "<!--**********************************\n";
$header .= "Main wrapper start\n";
$header .= "***********************************-->\n";
$header .= "<div id=\"main-wrapper\">\n";
$header .= "<!--**********************************\n";
$header .= "Nav header start\n";
$header .= "***********************************-->\n";
$header .= "<div class=\"nav-header\">\n";
$header .= "<a href=\"index.php\" class=\"brand-logo\">\n";
$header .= "<img class=\"logo-abbr\" src=\"./images/logo.png\" alt=\"\">\n";
// $header .= "<img class=\"logo-compact\" src=\"./images/logo-text.png\" alt=\"\">\n";
// $header .= "<img class=\"brand-title\" src=\"./images/logo-text.png\" alt=\"\">\n";
$header .= "</a> - [eg0n]\n";
$header .= "<div class=\"nav-control\">\n";
$header .= "<div class=\"hamburger\">\n";
$header .= "<span class=\"line\"></span><span class=\"line\"></span><span class=\"line\"></span>\n";
$header .= "</div>\n";
$header .= "</div>\n";
$header .= "</div>\n";
$header .= "<!--**********************************\n";
$header .= "Nav header end\n";
$header .= "***********************************-->\n";

$header .= "<!--**********************************\n";
$header .= "Header start\n";
$header .= "***********************************-->\n";
$header .= "<div class=\"header\">\n";
$header .= "<div class=\"header-content\">\n";
$header .= "<nav class=\"navbar navbar-expand\">\n";
$header .= "<div class=\"collapse navbar-collapse justify-content-between\">\n";
$header .= "<div class=\"header-left\">\n";
$header .= "<div class=\"search_bar dropdown\">\n";
$header .= "<span class=\"search_icon p-3 c-pointer\" data-toggle=\"dropdown\">\n";
$header .= "<i class=\"mdi mdi-magnify\"></i>\n";
$header .= "</span>\n";
$header .= "<div class=\"dropdown-menu p-0 m-0\">\n";
$header .= "<form>\n";
$header .= "<input class=\"form-control\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\">\n";
$header .= "</form>\n";
$header .= "</div>\n";
$header .= "</div>\n";
$header .= "</div>\n";
$header .= "<ul class=\"navbar-nav header-right\">\n";
$header .= "<li class=\"nav-item dropdown notification_dropdown\">\n";
$header .= "<a class=\"nav-link\" href=\"#\" role=\"button\" data-toggle=\"dropdown\">\n";
$header .= "<i class=\"mdi mdi-bell\"></i>\n";
$header .= "<div class=\"pulse-css\"></div>\n";
$header .= "</a>\n";
$header .= "<div class=\"dropdown-menu dropdown-menu-right\">\n";
$header .= "<ul class=\"list-unstyled\">\n";

### Notification block
$query = "SELECT * FROM `notifications` ORDER BY id ASC LIMIT 0, 5";
$result = $mysqli->query($query);
while($row = $result->fetch_assoc())
{
    $header .= "<li class=\"media dropdown-item\">\n";
    $header .= "<span class=\"success\"><i class=\"ti-user\"></i></span>\n";
    $header .= "<div class=\"media-body\"><a href=\"#\"><p>" . $row["message"] . "</p></a></div>\n";
    $header .= "<span class=\"notify-time\">" . $row["date"] . "</span>\n";
    $header .= "</li>\n";
}

$header .= "</ul>\n";
$header .= "<a class=\"all-notification\" href=\"#\">See all notifications <i\n";
$header .= "class=\"ti-arrow-right\"></i></a>\n";
$header .= "</div>\n";
$header .= "</li>\n";
$header .= "<li class=\"nav-item dropdown header-profile\">\n";
$header .= "<a class=\"nav-link\" href=\"#\" role=\"button\" data-toggle=\"dropdown\">\n";
$header .= "<i class=\"mdi mdi-account\"></i>\n";
$header .= "</a>\n";
$header .= "<div class=\"dropdown-menu dropdown-menu-right\">\n";
$header .= "<a href=\"./app-profile.html\" class=\"dropdown-item\">\n";
$header .= "<i class=\"icon-user\"></i>\n";
$header .= "<span class=\"ml-2\">Profile </span>\n";
$header .= "</a>\n";
$header .= "<a href=\"./email-inbox.html\" class=\"dropdown-item\">\n";
$header .= "<i class=\"icon-envelope-open\"></i>\n";
$header .= "<span class=\"ml-2\">Inbox </span>\n";
$header .= "</a>\n";
$header .= "<a href=\"./page-login.html\" class=\"dropdown-item\">\n";
$header .= "<i class=\"icon-key\"></i>\n";
$header .= "<span class=\"ml-2\">Logout </span>\n";
$header .= "</a>\n";
$header .= "</div>\n";
$header .= "</li>\n";
$header .= "</ul>\n";
$header .= "</div>\n";
$header .= "</nav>\n";
$header .= "</div>\n";
$header .= "</div>\n";
$header .= "<!--**********************************\n";
$header .= "Header end ti-comment-alt\n";
$header .= "***********************************-->\n";

$header .= "<!--**********************************\n";
$header .= "Sidebar start\n";
$header .= "***********************************-->\n";
$header .= "<div class=\"quixnav\">\n";
$header .= "<div class=\"quixnav-scroll\">\n";
$header .= "<ul class=\"metismenu\" id=\"menu\">\n";
$header .= "<li class=\"nav-label first\">Main Menu</li>\n";
$header .= "<li><a class=\"has-arrow\" href=\"javascript:void()\" aria-expanded=\"false\"><i class=\"icon icon-single-04\"></i><span class=\"nav-text\">Dashboard</span></a>\n";
$header .= "<ul aria-expanded=\"false\">\n";
$header .= "<li><a href=\"./index.php\">Main</a></li>\n";
$header .= "<li><a href=\"./index_blue.php\">Blue Team Ops.</a></li>\n";
$header .= "<li><a href=\"./index_red.php\">Red Team Ops.</a></li>\n";
$header .= "</ul>\n";
$header .= "</li>\n";
$header .= "<li class=\"nav-label\">Apps</li>\n";
$header .= "<li><a class=\"has-arrow\" href=\"javascript:void()\" aria-expanded=\"false\"><i class=\"icon icon-app-store\"></i><span class=\"nav-text\">Apps</span></a>\n";
$header .= "<ul aria-expanded=\"false\">\n";
$header .= "<li><a href=\"./app_domain_enum.php\">Domain Enum</a></li>\n";
$header .= "<li><a href=\"./app_ip_analysis.php\">IP Analysis</a></li>\n";
$header .= "</ul>\n";
$header .= "</li>\n";
$header .= "</ul>\n";
$header .= "</div>\n";
$header .= "</div>\n";
$header .= "<!--**********************************\n";
$header .= "Sidebar end\n";
$header .= "***********************************-->\n";

/**************************************************************************************************
 * page footer 
 *************************************************************************************************/

$footer  ="<!--**********************************\n";
$footer .="Footer start\n";
$footer .="***********************************-->\n";
$footer .="<div class=\"footer\">\n";
$footer .="<div class=\"copyright\">\n";
$footer .="<p>Copyright © Designed &amp; Developed by <a href=\"#\" target=\"_blank\">Quixkit</a> 2019</p>\n";
$footer .="</div>\n";
$footer .="</div>\n";
$footer .="<!--**********************************\n";
$footer .="Footer end\n";
$footer .="***********************************-->\n";
$footer .="<!--**********************************\n";
$footer .="Support ticket button start\n";
$footer .="***********************************-->\n";
$footer .="<!--**********************************\n";
$footer .="Support ticket button end\n";
$footer .="***********************************-->\n";
$footer .="</div>\n";
$footer .="<!--**********************************\n";
$footer .="Main wrapper end\n";
$footer .="***********************************-->\n";
$footer .="<!--**********************************\n";
$footer .="Scripts\n";
$footer .="***********************************-->\n";
$footer .="<!-- Required vendors -->\n";
$footer .="<script src=\"./vendor/global/global.min.js\"></script>\n";
$footer .="<script src=\"./js/quixnav-init.js\"></script>\n";
$footer .="<script src=\"./js/custom.min.js\"></script>\n";
$footer .="<!-- Vectormap -->\n";
$footer .="<script src=\"./vendor/raphael/raphael.min.js\"></script>\n";
$footer .="<script src=\"./vendor/morris/morris.min.js\"></script>\n";
$footer .="<script src=\"./vendor/circle-progress/circle-progress.min.js\"></script>\n";
$footer .="<script src=\"./vendor/chart.js/Chart.bundle.min.js\"></script>\n";
$footer .="<script src=\"./vendor/gaugeJS/dist/gauge.min.js\"></script>\n";
$footer .="<!--  flot-chart js -->\n";
$footer .="<script src=\"./vendor/flot/jquery.flot.js\"></script>\n";
$footer .="<script src=\"./vendor/flot/jquery.flot.resize.js\"></script>\n";
$footer .="<!-- Owl Carousel -->\n";
$footer .="<script src=\"./vendor/owl-carousel/js/owl.carousel.min.js\"></script>\n";
$footer .="<!-- Counter Up -->\n";
$footer .="<script src=\"./vendor/jqvmap/js/jquery.vmap.min.js\"></script>\n";
$footer .="<script src=\"./vendor/jqvmap/js/jquery.vmap.usa.js\"></script>\n";
$footer .="<script src=\"./vendor/jquery.counterup/jquery.counterup.min.js\"></script>\n";
$footer .="<script src=\"./js/dashboard/dashboard-1.js\"></script>\n";
$footer .="</body>\n";
$footer .="</html>\n";

function add_body($content)
{
    $body  = "<!--**********************************\n";
    $body .= "Content body start\n";
    $body .= "***********************************-->\n";
    $body .= "<div class=\"content-body\">\n";
    $body .= "<!-- row -->\n";
    $body .= "<div class=\"container-fluid\">\n";

    $body .= $content;

    $body .= "</div>\n";
    $body .= "</div>\n";
    $body .= "<!--**********************************\n";
    $body .= "Content body end\n";
    $body .= "***********************************-->\n";
    
    return $body;
}
