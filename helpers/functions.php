<?php
// title H1
function titleH1($title)
{
    echo "<h1 class='text-3xl font-black text-center'>{$title}</h1>";
}

 //debug array
function debug_array($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// print error message
function errorMsg($name)
{
    global $error;
    if (isset($error[$name])) {
        echo $error[$name];
    }
}

// show value of input
function showInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

//show select value
function showSelectValue($name, $value)
{
    if (!empty($_POST[$name]) && $_POST[$name] == $value) {
        echo "selected";
    }
}
// update select
function showUpdateSelectValue($item, $value)
{
    if ($item == $value) {
        echo "selected";
    }
}

//show select value
function showRadioValue($name, $value = 1)
{
    if (!isset($_POST[$name]) &&  $value == 1) {
        echo "checked";
    }elseif (!isset($_POST[$name])) {
        echo "";
    }elseif ($_POST[$name] == $value) {
        echo "checked";
    }
}
function showUpdateRadioValue($item,  $value)
{
    if ($item == $value) {
        echo "checked";
    }
}
//nettoyage des input
function cleanInput($string)
{
    return trim(htmlspecialchars($string));
}