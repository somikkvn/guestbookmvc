<h2 align="center">Guest book</h2>

<div class="form-group">
    <?php if (!empty($_SESSION["id"])) : ?>
        <form id="comment_from">
            <p><br>
                <input type="text" name="author" class="form-control" placeholder="Your name:"
                       value="<?php echo(!empty($_POST['author']) ? $_POST['author'] : ''); ?>"/>
            <p><br>
                <textarea name="text" class="form-control" placeholder="Comment:"
                          value="<?php echo(!empty($_POST['text']) ? $_POST['text'] : ''); ?>"></textarea></p>
            <input type="hidden" name="parent_id" value="0"/>
            <p><input class="btn btn-default" type="submit" name="submit" class="btn btn-secondary" value="Submit"/></p>
        </form>
    <?php else: ?>
</div>
<div class="form">
    <a href="\login">To reply to a comment, you need to log in</a>
    or <a href="\register">register.</a>
</div>
<?php endif; ?>

<h3 align="center">List of all messages:</h3>

<nav align="center" aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        if ($_GET['page'] > 1) {
            ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $_GET['page'] - 1 ?>">
                    Previous
                </a>
            </li>
            <?php
        }
        ?>

        <? for ($i = 0; $i <= $len; $i++) { ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $i + 1 ?>"><?= $i + 1 ?></a></li>
        <? } ?>

        <?php
        if (($_GET['page']) <= $len) {
            ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $_GET['page'] + 1 ?>">
                    Next
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</nav>

