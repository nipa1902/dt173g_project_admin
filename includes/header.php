<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>DT173G Projekt - Adminwebbtjänst</title>
    <style>
        .col-sm-3 {overflow: hidden;}
        .col-sm-3 span {float: right;}
        body {margin-bottom: 100px;}
        div.row {padding: 1rem; border: 1px solid black; margin: 0.25rem; background: whitesmoke;}

        @media screen and (max-width: 576px) {
            div.row {
                padding: 2rem;
                margin: 2rem;
                text-align: center;
                border: 3px solid black;
            }
            .col-sm-3 {
                border-bottom: 1px dotted gray;
            }
            .col-sm-3 span {
                float: none;
                display: block;
            }
        }

    </style>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class='navbar-brand' href='http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/admin/index.php'>Hem</a>
    <?php if(isset($_SESSION['name'])) {
        echo "<a class='navbar-brand text-danger' href='http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/admin/config/logout.php'>Logga ut</a>";
    } else {
        echo "<a class='navbar-brand text-success' href='http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/admin/config/login.php'>Logga in</a>";
    } ?>
</nav>