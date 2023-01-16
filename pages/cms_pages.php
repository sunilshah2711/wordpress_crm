<?php
ob_start();
//admin menu page function
function posts()
{
    header('Location: edit.php');
}
function postnew()
{
    header('Location: post-new.php');
}
function categories()
{
    header('Location: edit-tags.php?taxonomy=category');
}
function tages()
{
    header('Location: edit-tags.php?taxonomy=post_tag');
}
function upload()
{
    header('Location: upload.php');
}
function addnewlib()
{
    header('Location: media-new.php');
}
function allpages()
{
    header('Location: edit.php?post_type=page');
}
function newpages()
{
    header('Location: post-new.php?post_type=page');
}

function comments()
{
    header('Location: edit-comments.php');
}
?>