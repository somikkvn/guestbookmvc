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
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand">
                <h1>MVC Guest book</h1>
            </a>
        </div>
        <div class="collapse navbar-collapse">
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

<script src="/public/js/jquery-3.1.1.min.js"></script>
<script src="/public/js/register.js"></script>
<script src="/public/js/login.js"></script>
<script src="/public/js/guestInsert.js"></script>
<script src="/public/js/guestGetComment.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/bootstrap.js"></script>
</body>
</html>


