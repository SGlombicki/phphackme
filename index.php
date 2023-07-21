<?php
if (isset($_GET['s']))
{
    highlight_file(__FILE__);
    exit(0);
}
function assert_failed($script, $line, $message)
{
    die('Try again...');
}


if (isset($_GET['f']))
{
    $file=$_GET['f'];

    if (preg_match('/(f|l|a|g|\.|p|h|p|\/|\$|;|\"|\'|\`|\|)/i',$file)) // don't allow flag.php
    {
        die('Try again...');
    }

    assert_options(ASSERT_ACTIVE, 1);
    assert_options(ASSERT_WARNING, 0);
    assert_options(ASSERT_BAIL, 1);
    assert_options(ASSERT_CALLBACK, 'assert_failed');
    assert('"flag.php"==='.$file); // only allow flag.php

    echo file_get_contents($file);
}
else
{
?>
