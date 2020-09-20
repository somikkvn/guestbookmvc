<?php echo "№" . ' ' . $comment_id. ' ';
 echo $author.'<br>';
 echo "Comment:" . ' ' . $text;
echo '
                            <input type="text" id="author'.$comment_id.'" class="form-control" placeholder="Your name:"/>
                            <br><textarea id="text'.$comment_id.'" class="form-control" placeholder="Comment:"></textarea>
                            </p>
                            <input type="hidden" id="parent_id'.$comment_id.'" value = "'.$comment_id.'"/>
                            <p>
                            <button id="'.$comment_id.'" class="btn btn-default" type="submit" name="submit" class="btn btn-secondary" value="Submit">Submit</button>
                            </p>
                       ';

echo '<div id="comment0"> </div>';
echo '<ul><li><div id="comment'.$comment_id.'"> </div></li></ul>';
