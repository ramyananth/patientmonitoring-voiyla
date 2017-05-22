<?php
$post_vars = array();
foreach ($_POST as $key => $value)
{
    $post_vars[$key] = $value;
}print_r($post_vars);

?>