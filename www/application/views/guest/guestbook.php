<h2 align="center">Guest book</h2>

<div class="form-group">
    <?php if (!empty($_SESSION["id"])) : ?>
        <form id="comment_from">
            <p><br>
                <input type="text" id="author" class="form-control" placeholder="Your name:"
                       value="<?php echo(!empty($_POST['author']) ? $_POST['author'] : ''); ?>"/>
            <p><br>
                <textarea id="text" class="form-control" placeholder="Comment:"
                          value="<?php echo(!empty($_POST['text']) ? $_POST['text'] : ''); ?>"></textarea></p>
            <input type="hidden" id="parent_id" value="0"/>
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

<?php
if (!empty($items)) {
    foreach ($items as $item) { ?>
        <img align="right" src="/public/img/4.jpg" height="50">
        <?php echo "№" . ' ' . $item['comment_id']; ?>
        <?php echo $item['author']; ?><br>
        <?php echo "Comment:" . ' ' . $item['text']; ?>

        <?php if (!empty($_SESSION["id"])) : ?>
            <form id="comment_from2">
                <input type="text" id="author2" class="form-control" placeholder="Your name:"
                       value="<?php echo(!empty($_POST['author']) ? $_POST['author'] : ''); ?>"/>
                <br>
                <textarea id="text2" class="form-control" placeholder="Comment:"
                          value="<?php echo(!empty($_POST['text']) ? $_POST['text'] : ''); ?>"></textarea></p>
                <input type="hidden" id="parent_id2" value="<?php echo($item['comment_id']); ?>"/>
                <p><input class="btn btn-default" type="submit" name="submit" class="btn btn-secondary" value="Submit"/></p>
            </form>
        <?php else: ?>
            <div class="form">
                <a href="\login">To reply to a comment, you need to log in</a>
                or <a href="\register">register.</a>
            </div>
        <?php endif; ?>


        <?php
        if (!empty($item['childrens'])) {
            foreach ($item['childrens'] as $item2) { ?>
                <img align="right" src="/public/img/3.jpg" height="50">
                <ul>
                    <?php echo "№" . ' ' . $item2['comment_id']; ?>
                    <?php echo $item2['author']; ?><br>
                    <?php echo "Comment:" . ' ' . $item2['text']; ?>

                    <?php if (!empty($_SESSION["id"])) : ?>
                        <form id="comment_from3">
                            <input type="text" id="author3" class="form-control" placeholder="Your name:"
                                   value="<?php echo(!empty($_POST['author']) ? $_POST['author'] : ''); ?>"/>
                            <br><textarea id="text3" class="form-control" placeholder="Comment:"
                                          value="<?php echo(!empty($_POST['text']) ? $_POST['text'] : ''); ?>"></textarea>
                            </p>
                            <input type="hidden" id="parent_id3" value="<?php echo($item2['parent_id']); ?>"/>
                            <p><input class="btn btn-default" type="submit" name="submit" class="btn btn-secondary" value="Submit"/></p>
                        </form>
                    <?php else: ?>
                        <div class="form">
                            <a href="\login">To reply to a comment, you need to log in</a>
                            or <a href="\register">register.</a>
                        </div>
                    <?php endif; ?>
                </ul>

            <?php }
        }
    }
} ?>


