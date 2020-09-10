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
            if (!empty($_POST) && !empty($_POST['author']) && !empty($_POST['text'])  ) {
                $author = $_POST['author'];
                $text = $_POST['text'];
                $parent_id = $_POST['parent_id'];
//                var_dump($_POST);
//                die;

                $result = $this->model->guestbookAction($author, $text, $parent_id);
                if (!empty($result['error_messange'])){
                    $data['error'] = $result['error_messange'];
                }else{

                    header('Location: /guestbook');
                }
            }


            //Пагинация
            $limit = 3;
            $offset = $limit * ($page-1);
            for($i=0; $i < $limit; $i++){
//                echo $i;
            }

            $data['items']= $this->model->getCount();
//            var_dump($data['items']);
//            die;
            $data['len'] = floor(count($data['items'])/$limit);

            $data['items']= $this->model->getParent($limit, $offset);

            foreach ($data['items'] as $item_key => $item) {
                $data ['items'][$item_key]['childrens'] = $this->model->getComment( $item['comment_id']);
//                var_dump($data ['items'][$item_key]);
//                die;
            }
            $this->view->render('Гостевая книга', $data);
        }
    }
}

