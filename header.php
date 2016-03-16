<?php 
require_once 'database.php';
?>


<!doctype html>
<!--
Designed by: http://www.cssing.org
Released for free under a Creative Commons Attribution 3.0 License: http://creativecommons.org/licenses/by/3.0/
Name: Village Hall
Description:  A two-columns, responsive design template.
Template number: 32
Version: 1.0
Released: 4.3.13
-->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Village Hall</title>
<link href='http://fonts.googleapis.com/css?family=Coda|Oranienbaum|Amarante' rel='stylesheet' type='text/css'>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
	 // DOM ready
	 $(function() {
	   
      // Create the dropdown base
      $("<select />").appendTo("nav");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Select a page"
      }).appendTo("nav select");
      
      // Populate dropdown with menu items
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });
      
	   // To make dropdown actually work
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 
	 });
	</script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li class="active"><a href="">Home</a></li>
            <li><a href="">Village</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>    
</header>


