<?php

namespace application\models;

use application\core\Model;

class Guest extends Model {

//    Вставка комментариев в бд
    public function guestbookAction($author, $text, $parent_id)
    {
        $stmt = $this->db->prepare("INSERT INTO comments (`author`, `text`, `parent_id`) VALUES (:author, :text, :parent_id)");

        $stmt->bindParam(':author', $author, \PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, \PDO::PARAM_STR);
        $stmt->bindParam(':parent_id', $parent_id, \PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM `comments` WHERE `author` = :author and `text` = :text and `parent_id`= :parent_id");

        $stmt->bindParam(':author', $author, \PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, \PDO::PARAM_STR);
        $stmt->bindParam(':parent_id', $parent_id, \PDO::PARAM_STR);
        $stmt->execute();

        $array = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $array;

    }

    // Возвращаем все родительские комментарии
    public function getParent($limit, $offset)
    {
        $result = $this->db->prepare("SELECT * FROM comments  WHERE parent_id=0 LIMIT $limit OFFSET $offset");
        $result->execute();
        $row = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    // Количество всех комментов
    public function getCount()
    {
        $result = $this->db->prepare("SELECT * FROM comments WHERE parent_id=0");
        $result->execute();
        $row = $result->fetchAll(\PDO::FETCH_ASSOC);
//        var_dump(count($row));
//        die;
        return $row;
    }

//Отвечаем на родительские комментарии
    public function getComment($parent_id)
    {
        $result = $this->db->prepare("SELECT * FROM comments WHERE parent_id=:parent_id");
        $result->bindParam(':parent_id', $parent_id, \PDO::PARAM_STR);
        $result->execute();
        $items2 = $result->fetchAll(\PDO::FETCH_ASSOC);
        if (count($items2) > 0) {
            foreach ($items2 as $item2_key => $item2){
                  $items2[$item2_key]["childrens"] = $this->getComment($item2 ['comment_id']);
            }
        }
        return $items2;
    }

//    function getComment ($row) {
//        $parent_id_value=$row['id'];
//        $res = mysqli_query("SELECT * FROM comments where parent_id=".$row['comment_id']);
//        global $i;
//        $i++;
//            if (mysqli_num_rows($res) > 0) {
//
//                while ($res1 = mysqli_fetch_assoc($res)&& $i<3){
//                    $this->getComment($res1);
//                }
//            $i--;
//        }
//    }
}
