<div>
    <form align="center">
        <h2 class="text-secondary">Login page</h2><br>
        <div style="color: red">
            <?php if (!empty($error)) { ?>
                <div class="row error">
                    <ul>
                        <?php foreach ($error as $item) { ?>
                            <li><?
                                echo $item; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>

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
                <input id="password" class="form-control" type="password" name="password" required="" placeholder="Password"
                       value=""/>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div>
            <br>
            <input id="send2" class="btn btn-default" type="submit" name="submit2" class="btn btn-secondary" value="Sign in"/>
        </div>
        <p>
            <br>
            You don't have an account - <a href="\register">register!</a>
        </p>
</div>
</form>
<img align="right" src="/public/img/6.jpg" height="180" width="100%">
</div>
