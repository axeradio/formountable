<?php

require 'config.php';

include 'DB.php';
include 'Forms.php';
include 'Items.php';

header('Content-Type: text/plain');

if (isset($_GET['item']) && ((int) $_GET['item']) > 0)
{
    echo json_encode(Items::getItem((int) $_GET['item']));
}
elseif (isset($_GET['items']) && isset($_GET['form']) && ((int) $_GET['form']) > 0)
{
    echo json_encode(Items::getFormItems((int) $_GET['form']));
}
elseif (isset($_GET['form']) && ((int) $_GET['form']) > 0)
{
    echo json_encode(Forms::getFormFields((int) $_GET['form']));
}
else if (isset($_GET['forms']))
{
    echo json_encode(Forms::getForms());
}

// Your mother was a hamster. Bitch.