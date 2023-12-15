<?php

include("./include.php");

$target = addslashes(stripslashes($_GET["target"]));

if ($target != '')
{
    // intro banner
    $content  = "<div class=\"row page-titles mx-0\">\n";
    $content .= "<div class=\"col-sm-6 p-md-0\">\n";
    $content .= "<div class=\"welcome-text\">\n";
    $content .= "<h4>Domains info for <b>$target</b></h4>\n";
    $content .= "<p class=\"mb-0\"> </p>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "<div class=\"col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex\">\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "<!-- row -->\n";
    $content .= "<div class=\"row\">\n";

    // domain details
    $content .= "<div class=\"col-lg-12\">\n";
    $content .= "<div class=\"card\">\n";
    $content .= "<div class=\"card-header\"><h4 class=\"card-title\">Responsive Table</h4></div>\n";
    $content .= "<div class=\"card-body\">\n";
    $content .= "<div class=\"table-responsive\">\n";
    $content .= "<table class=\"table header-border table-responsive-sm\">\n";
    $content .= "<thead><tr><th>Base URL</th><th>IP address</th><th>NS</th><th>MX</th><th>Expiration day</th><th>Admin Contact</th></tr></thead>\n";
    $content .= "<tbody>\n";
    // get data from DB
    $sql = "SELECT * FROM `domains` WHERE `target` = '" . $target . "' AND `lastview_timestamp` >= UNIX_TIMESTAMP(NOW() - INTERVAL 1 HOUR) ORDER BY id";
    $res = $mysqli->query($sql);
    while($row = $res->fetch_assoc())
    {
        // ip address list
        $ip_list = explode(" ", $row["ipaddress"])
        $ip_string = ''
        for($i = 0; $i < count($ip_list); $i++)
        {
            if ($i < count($ip_list)-1)
            {
                $ip_string += $ip_list[$i] . "<br/>";
            }
            else
            {
                $ip_string += $ip_list[$i];
            }
        }

        $content .= "<tr>\n";
        $content .= "<td>" . $row["base_url"] . "</td><td>" . $ip_string . "</td><td>" . $row["ns"] . "</td><td>" . $row["mx"] . "</td><td>-</td><td>-</td>\n";
        $content .= "</tr>\n";
    }
    $content .= "</tbody>\n";
    $content .= "</table>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";

    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";

    $content .= "<!--**********************************\n";
    $content .= "Scripts\n";
    $content .= "***********************************-->\n";
    $content .= "<!-- Required vendors -->\n";
    $content .= "<script src=\"./vendor/global/global.min.js\"></script>\n";
    $content .= "<script src=\"./js/quixnav-init.js\"></script>\n";
    $content .= "<script src=\"./js/custom.min.js\"></script>\n";
}
else
{
    // intro banner
    $content  = "<div class=\"row page-titles mx-0\">\n";
    $content .= "<div class=\"col-sm-6 p-md-0\">\n";
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

    // Target list
    $content .= "<div class=\"col-xl-4 col-xxl-6 col-lg-6 col-md-6\">\n";
    $content .= "<div class=\"card\">\n";
    $content .= "<div class=\"card-header\">\n";
    $content .= "<h4 class=\"card-title\">Target list</h4>\n";
    $content .= "</div>\n";
    $content .= "<div class=\"card-body\">\n";
    $content .= "<div class=\"basic-list-group\">\n";
    $content .= "<ul class=\"list-group\">\n";
    $sql_target = "SELECT * FROM `target` ORDER BY id ASC LIMIT 0, 15";
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

    // Domain list
    $content .= "<div class=\"col-xl-4 col-xxl-6 col-lg-6 col-md-6\">\n";
    $content .= "<div class=\"card\">\n";
    $content .= "<div class=\"card-header\">\n";
    $content .= "<h4 class=\"card-title\">Domain list</h4>\n";
    $content .= "</div>\n";
    $content .= "<div class=\"card-body\">\n";
    $content .= "<div class=\"basic-list-group\">\n";
    $content .= "<ul class=\"list-group\">\n";
    $sql_target = "SELECT * FROM `domains` WHERE `lastview_timestamp` >= UNIX_TIMESTAMP(NOW() - INTERVAL 1 HOUR) ORDER BY id DESC LIMIT 0, 15";
    $result = $mysqli->query($sql_target);
    while($row = $result->fetch_assoc())
    {
        $content .= "<li class=\"list-group-item\"><a href=\"./app_domain_enum.php?target=" . $row["target"] . "\">" . $row["target"] . "</a> (" . $row["base_url"] . ")<br />" . $row["ipaddress"] . "</li>\n";
    }
    $content .= "</ul>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";

    // Last discoveder subdomain
    $content .= "<div class=\"col-xl-4 col-xxl-6 col-lg-6 col-md-6\">\n";
    $content .= "<div class=\"card\">\n";
    $content .= "<div class=\"card-header\">\n";
    $content .= "<h4 class=\"card-title\">Subdomain list</h4>\n";
    $content .= "</div>\n";
    $content .= "<div class=\"card-body\">\n";
    $content .= "<div class=\"basic-list-group\">\n";
    $content .= "<ul class=\"list-group\">\n";
    $sql_target = "SELECT * FROM `subdomain` WHERE `lastview_timestamp` >= UNIX_TIMESTAMP(NOW() - INTERVAL 1 HOUR) ORDER BY id DESC LIMIT 0, 15";
    $result = $mysqli->query($sql_target);
    while($row = $result->fetch_assoc())
    {
        $content .= "<li class=\"list-group-item\">" . $row["subdomain"] . "<br />" . $row["ipaddress"] . "</li>\n";
    }
    $content .= "</ul>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";

    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";
    $content .= "</div>\n";

    $content .= "<!--**********************************\n";
    $content .= "Scripts\n";
    $content .= "***********************************-->\n";
    $content .= "<!-- Required vendors -->\n";
    $content .= "<script src=\"./vendor/global/global.min.js\"></script>\n";
    $content .= "<script src=\"./js/quixnav-init.js\"></script>\n";
    $content .= "<script src=\"./js/custom.min.js\"></script>\n";
}

echo $header;
echo add_body($content);
echo $footer;

?>