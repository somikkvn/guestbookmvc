<?php

namespace application\controllers;

use application\core\Controller;

class GuestController extends Controller
{
    public function guestbookAction()
    {
        {
            $page = (!empty($_GET['page']) && $_GET['page'] > 0)
                ? $_GET['page']
                : 1;

            $data = [];
            if (!empty($_POST) && !empty($_POST['author']) && !empty($_POST['text'])) {
                $author = $_POST['author'];
                $text = $_POST['text'];
                $parent_id = $_POST['parent_id'];

                $result = $this->model->guestbookAction($author, $text, $parent_id);
                if (!empty($result)) {
                    $response3 = json_encode($result);
                    header('Content-Type: application/json');
                    echo $response3;

                    $response4 = json_encode($result);
                    header('Content-Type: application/json');
                    echo $response4;

                    $response5 = json_encode($result);
                    header('Content-Type: application/json');
                    echo $response5;

                    return true;
                }
            }

            //Пагинация
            $limit = 5;
            $offset = $limit * ($page - 1);
            for ($i = 0; $i < $limit; $i++) {
            }

            $data['items'] = $this->model->getCount();
            $data['len'] = floor(count($data['items']) / $limit);
            $data['items'] = $this->model->getParent($limit, $offset);
            foreach ($data['items'] as $item_key => $item) {
                $data ['items'][$item_key]['childrens'] = $this->model->getComment($item['comment_id']);
            }
            $this->view->render('Гостевая книга', $data);
        }
    }
}

