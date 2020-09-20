<h2 align="center">Guest book</h2>
<div class="form-group">
    <?php if (!empty($_SESSION["id"])) : ?>

        <p><br>
            <input type="text" id="author0" class="form-control" placeholder="Your name:"
                   value="<?php echo(!empty($_POST['author']) ? $_POST['author'] : ''); ?>"/>
        <p><br>
            <textarea id="text0" class="form-control" placeholder="Comment:"
                      value="<?php echo(!empty($_POST['text']) ? $_POST['text'] : ''); ?>"></textarea></p>
        <input type="hidden" id="parent_id0" value="0"/>
        <p>
            <button class="btn btn-default" type="submit" id="0" name="submit" class="btn btn-secondary">Submit</button>
        </p>

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
<div id="comment0"></div>

<?php
if (!empty($items)) {
    foreach ($items as $item) { ?>
        <img align="right" src="/public/img/4.jpg" height="50">
        <?php echo "№" . ' ' . $item['comment_id']; ?>
        <?php echo $item['author']; ?><br>
        <?php echo "Comment:" . ' ' . $item['text']; ?>

        <?php if (!empty($_SESSION["id"])) : ?>

            <input type="text" id="author<?php echo $item['comment_id']; ?>" class="form-control"
                   placeholder="Your name:"
                   value="<?php echo(!empty($_POST['author']) ? $_POST['author'] : ''); ?>"/>
            <br>
            <textarea id="text<?php echo $item['comment_id']; ?>" class="form-control" placeholder="Comment:"
                      value="<?php echo(!empty($_POST['text']) ? $_POST['text'] : ''); ?>"></textarea></p>
            <input type="hidden" id="parent_id<?php echo $item['comment_id']; ?>"
                   value="<?php echo($item['comment_id']); ?>"/>
            <p>
                <button id="<?php echo $item['comment_id']; ?>" class="btn btn-default" type="submit" name="submit"
                        class="btn btn-secondary" value="Submit">Submit
                </button>
            </p>


        <?php else: ?>
            <div class="form">
                <a href="\login">To reply to a comment, you need to log in</a>
                or <a href="\register">register.</a>
            </div>
        <?php endif; ?>

        <ul>
            <div id="comment<?php echo $item['comment_id']; ?>"></div>
        </ul>
        <?php
        if (!empty($item['childrens'])) {
            foreach ($item['childrens'] as $item2) { ?>
                <img align="right" src="/public/img/3.jpg" height="50">
                <ul>
                    <ul>
                        <?php echo "№" . ' ' . $item2['comment_id']; ?>
                        <?php echo $item2['author']; ?><br>
                        <?php echo "Comment:" . ' ' . $item2['text']; ?>

                        <?php if (!empty($_SESSION["id"])) : ?>

                            <input type="text" id="author<?php echo $item2['comment_id']; ?>" class="form-control"
                                   placeholder="Your name:"
                                   value="<?php echo(!empty($_POST['author']) ? $_POST['author'] : ''); ?>"/>
                            <br><textarea id="text<?php echo $item2['comment_id']; ?>" class="form-control"
                                          placeholder="Comment:"
                                          value="<?php echo(!empty($_POST['text']) ? $_POST['text'] : ''); ?>"></textarea>
                            </p>
                            <input type="hidden" id="parent_id<?php echo $item2['comment_id']; ?>"
                                   value="<?php echo($item2['parent_id']); ?>"/>
                            <p>
                                <button id="<?php echo $item2['comment_id']; ?>" class="btn btn-default" type="submit"
                                        name="submit"
                                        class="btn btn-secondary" value="Submit">Submit
                                </button>
                            </p>

                        <?php else: ?>
                            <div class="form">
                                <a href="\login">To reply to a comment, you need to log in</a>
                                or <a href="\register">register.</a>
                            </div>
                        <?php endif; ?>
                    </ul>
                </ul>
                <ul>
                    <ul>
                        <div id="comment<?php echo $item2['comment_id']; ?>"></div>
                    </ul>
                </ul>

            <?php }

            if (!empty($item2['childrens'])) {
                foreach ($item2['childrens'] as $item3) { ?>
                    <img align="right" src="/public/img/3.jpg" height="50">
                    <ul>
                        <ul>
                            <ul>
                                <?php echo "№" . ' ' . $item3['comment_id']; ?>
                                <?php echo $item3['author']; ?><br>
                                <?php echo "Comment:" . ' ' . $item3['text']; ?>

                                <?php if (!empty($_SESSION["id"])) : ?>

                                    <input type="text" id="author<?php echo $item3['comment_id']; ?>"
                                           class="form-control" placeholder="Your name:"
                                           value="<?php echo(!empty($_POST['author']) ? $_POST['author'] : ''); ?>"/>
                                    <br><textarea id="text<?php echo $item3['comment_id']; ?>" class="form-control"
                                                  placeholder="Comment:"
                                                  value="<?php echo(!empty($_POST['text']) ? $_POST['text'] : ''); ?>"></textarea>
                                    </p>
                                    <input type="hidden" id="parent_id<?php echo $item3['comment_id']; ?>"
                                           value="<?php echo($item3['parent_id']); ?>"/>
                                    <p>
                                        <button id="<?php echo $item3['comment_id']; ?>" class="btn btn-default"
                                                type="submit" name="submit"
                                                class="btn btn-secondary" value="Submit">Submit
                                        </button>
                                    </p>

                                <?php else: ?>
                                    <div class="form">
                                        <a href="\login">To reply to a comment, you need to log in</a>
                                        or <a href="\register">register.</a>
                                    </div>
                                <?php endif; ?>
                            </ul>
                        </ul>
                    </ul>
                    <ul>
                        <ul>
                            <ul>
                                <div id="comment<?php echo $item3['comment_id']; ?>"></div>
                            </ul>
                        </ul>
                    </ul>
                    <?php

                    if (!empty($item3['childrens'])) {
                        foreach ($item3['childrens'] as $item4) { ?>
                            <img align="right" src="/public/img/3.jpg" height="50">
                            <ul>
                                <ul>
                                    <ul>
                                        <ul>
                                            <?php echo "№" . ' ' . $item4['comment_id']; ?>
                                            <?php echo $item4['author']; ?><br>
                                            <?php echo "Comment:" . ' ' . $item4['text']; ?>
                                        </ul>
                                    </ul>
                                </ul>
                            </ul>
    <?php

    }}}}}}} ?>


