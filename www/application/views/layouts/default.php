<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-grid.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-grid.min.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>

</head>
<body>
<header>
    <nav role="navigation" class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand">
                <h1>MVC Guest book</h1>
            </a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">The task</a>
                </li>
                <li>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/register">Register</a>
                </li>
                <li>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/login">Login</a>
                </li>
                <li>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/guestbook">Guest book</a>
                </li>
                <li>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/logout">Logouts</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper container">
    <div class="row">
        <section class="col-md-12">
            <?php echo $content; ?>
        </section>
    </div>
</div>

<footer>
    <a> &copy; Vasyl Kozlovskyi 2020</a>
</footer>
<script src="/public/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/public/js/bootstrap.js" type="text/javascript"></script>
<script src="/public/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>


