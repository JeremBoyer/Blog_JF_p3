<?php
namespace Blog\Model;
class Paging extends Manager
{
    public function getPaging()
    {
        $db = $this->dbConnect();
        $per_page = 6;
        $req = $db->query('SELECT COUNT(id) as num
                                    FROM post
                                    WHERE deleted_at IS NULL
                                    ');
        $data = $req->fetch();
        $num = $data['num'];
        $totalPages = ceil($num/$per_page);
        $totalPages = intval($totalPages);
        return $totalPages;
    }
}