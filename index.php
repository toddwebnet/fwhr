<?php
include "includes/proc.php";

if (request("t")!= "ajax")
{
    include "includes/top_template.php";
    include "includes/views/" . $page . ".php";
    include "includes/bottom_template.php";
}