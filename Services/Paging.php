<?php
namespace Blog\Model;
/**
 * Class Paging
 * @package Blog\Model
 *
 * Services paging
 */
class Paging extends Manager
{
    /**
     * Query to get total pages of posts with 6 posts per page.
     *
     * @return int
     */
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

    /**
     * Query to get total pages of comments with 10 comments per page.
     *
     * @return int
     */
    public function getCommentPaging()
    {
        $db = $this->dbConnect();
        $per_page = 10;
        $req = $db->query('SELECT COUNT(comment.id) as num
                                    FROM comment
                                    LEFT JOIN user 
                                    ON comment.user_id_fk = user.id
                                    WHERE comment.deleted_at IS NULL && user.deleted_at IS NULL && comment.user_id_fk = user.id
                                    ');
        $data = $req->fetch();
        $num = $data['num'];
        $totalPages = ceil($num/$per_page);
        $totalPages = intval($totalPages);
        return $totalPages;
    }

    /**
     * Query to get total pages of users with 10 users per page.
     *
     * @return int
     */
    public function getUserPaging()
    {
        $db = $this->dbConnect();
        $per_page = 10;
        $req = $db->query('SELECT COUNT(id) as num
                                    FROM user
                                    WHERE deleted_at IS NULL
                                    ');
        $data = $req->fetch();
        $num = $data['num'];
        $totalPages = ceil($num/$per_page);
        $totalPages = intval($totalPages);
        return $totalPages;
    }

    /**
     * Block of pagination view.
     *
     * @param $page
     * @param $totalPages
     */
    public function paging($page, $totalPages)
    {
        if ($totalPages > 1) {
            if (empty($_GET['action'])) {
                $action = 'listPosts';
            } else {
                $action = $_GET['action'];
            }
        ?>
            <div class="container">
                <ul class="pagination justify-content-center">

        <?php
            if ($page == 1) {
        ?>
                   <li class="page-item disabled">
                       <a class="page-link" href="#" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                           <span class="sr-only">Previous</span>
                       </a>
                   </li>
        <?php
            } else {
        ?>
                   <li class="page-item">
                       <a class="page-link" href="index.php?action=<?= $action ?>&amp;page=<?= $page - 1 ?>"
                          aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                           <span class="sr-only">Previous</span>
                       </a>
                   </li>
        <?php
            }
            for ($i = 1; $i <= $totalPages; $i++) {
        ?>
                    <li class="page-item">
                        <?php
                        if ($i == $page) {
                            echo '<li class="page-item disabled"><a class="page-link" href="index.php?action=' . $action . '&amp;page=' . $i . '">' . $i . '</a></li> ';
                        } else {
                            echo '<a class="page-link" href="index.php?action=' . $action . '&amp;page=' . $i . '">' . $i . '</a> ';
                        }
                        ?>
                    </li>
        <?php
            }
            if ($page == $totalPages) {
        ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
        <?php
            } else {
        ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?action=<?= $action ?>&amp;page=<?= $page + 1 ?>"
                           aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
        <?php
            }
        ?>
                </ul>
            </div>
        <?php
        } else {
            echo '';
        }
    }
}