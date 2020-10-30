<?php
include('includes/header.php');
include('config/auth.php');
?>

<div class="container-fluid">

<h1> DT173G Admin</h1>

<p>Sidan använder Bootstrap för stilsättning.</p>
<p>För kod används en kombination av PHP och JS med Fetch API för att hantera CRUD-operationer.</p>
<p>Webbtjänsten samtalar med en externt hostad API.</p>


<h2> Utbildningskurser </h2>

<a href="courses/create.php">Skapa nytt inlägg</a>

<?php
include('courses/read.php');
?>

<h2> Tidigare arbeten </h2>

<a href="jobs/create.php">Skapa nytt inlägg</a>

<?php
include('jobs/read.php');
?>

<h2> Skapade webbplatser </h2>

<a href="websites/create.php">Skapa nytt inlägg</a>

<?php
include('websites/read.php');
?>

</div>

<?php
include('includes/footer.php')
?>
