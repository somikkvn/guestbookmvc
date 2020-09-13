<div align="center">
    <h2>Registration page</h2>
    <form action="/register" class="form-group" method="post">
        <div style="color: red">
            <?php if (!empty($error)) { ?>
                <div class="row error">
                    <ul>
                        <?php foreach ($error as $item) { ?>
                            <li><?
                                echo $item; ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <!--        <div class="container">-->
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm">
                <input id="username" class="form-control" type="text" name="username" required="" placeholder="Username"
                       value="<?php echo(!empty($_POST['username']) ? $_POST['username'] : ''); ?>"/>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm">
                <input id="email" class="form-control" type="email" name="email" required="" placeholder="Email"
                       value="<?php echo(!empty($_POST['email']) ? $_POST['email'] : ''); ?>"/>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm">
                <input id="first_name" class="form-control" type="text" name="first_name" required="" placeholder="Name"
                       value="<?php echo(!empty($_POST['first_name']) ? $_POST['first_name'] : ''); ?>"/>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm">
                <input id="last_name" class="form-control" type="text" name="last_name" required=""
                       placeholder="Surname"
                       value="<?php echo(!empty($_POST['last_name']) ? $_POST['last_name'] : ''); ?>"/>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm">
                <input id="password" class="form-control" type="password" name="password"
                       placeholder="Password: min 6 characters" required=""
                       value=""/>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm">
                <input id="confirm_password" class="form-control" type="password" name="confirm_password" required=""
                       value="" placeholder="Confirm password"/>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br>
        <div>
            <br>
            <input id="submit" class="btn btn-default" type="submit" name="submit" class="btn btn-secondary"
                   value="Register"/>
            <p>
                <br>
                You already have an account? - <a href="\login">Log in!</a>
            </p>
        </div>
</div>
</form>
</div>

