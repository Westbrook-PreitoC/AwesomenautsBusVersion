<link type="text/css" rel="stylesheet" href="dist/css/bootstrap-theme.css">
<link type="text/css" rel="stylesheet" href="dist/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="controller/read-posts.css">
<?php
require_once(__DIR__ . "/../model/config.php");

//this part of code makes sure you select FROM posts
$query = "SELECT * FROM posts";
$result = $_SESSION["connection"]->query($query);

//this code makes sure that you have results to your blog 
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='post'>";
        echo "<h1>" . $row['title'] . "</h1>";
        echo "<br />";
        echo"<h2>" . $row['post'] . "</h2>";
        echo "<br/>";
        echo "</div>";
    }
}
    

