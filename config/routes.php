<?php
$currentRoute = '';

function base_url()
{

    // Program to display URL of current page.
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else
        $link = "http";

    // Here append the common URL characters.
    $link .= "://";

    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];

    $exploded_link = explode('/', $link);
    $base_link = $exploded_link[0] . '//' . $exploded_link[2] . '/' . $exploded_link[3] . '/';

    // Print the link
    return $base_link;
}

function base_project()
{
    $base_location = $_SERVER['DOCUMENT_ROOT'] . '/latihan_php_dua/';
    return $base_location;
}