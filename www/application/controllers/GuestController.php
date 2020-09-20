<?php

namespace application\controllers;

use application\core\Controller;

class GuestController extends Controller
{
    public function guestbookAction()
    {
            $page = (!empty($_GET['page']) && $_GET['page'] > 0)
                ? $_GET['page']
                : 1;

            $data = [];

            //Пагинация
            $limit = 50;
            $offset = $limit * ($page - 1);
            for ($i = 0; $i < $limit; $i++) {
            }

            $data['items'] = $this->model->getCount();

            $data['len'] = floor(count($data['items']) / $limit);
            $data['items'] = $this->model->getParent($limit, $offset);
            foreach ($data['items'] as $item_key => $item) {
                $data ['items'][$item_key]['childrens'] = $this->model->getComment($item['comment_id']);
//                $result = $item;
//                $response3 = json_encode($item);
//                header('Content-Type: application/json');
//                echo $response3;
                //$this->view->replyGuest333($item);
            }

//
////                    $response4 = json_encode($result);
////                    header('Content-Type: application/json');
////                    echo $response4;
////
////                    $response5 = json_encode($result);
////                    header('Content-Type: application/json');
////                    echo $response5;
//                return true;
//            }
            $this->view->render('Гостевая книга', $data);

    }

    public function guestAction()
    {
        if (!empty($_POST) && !empty($_POST['author']) && !empty($_POST['text'])) {
            $author = $_POST['author'];
            $text = $_POST['text'];
            $parent_id = $_POST['parent_id'];
            $array1 = $this->model->guestbookAction($author, $text, $parent_id);
           // var_dump($array1);
            $this->view->getComment($array1);
        }
    }
}

