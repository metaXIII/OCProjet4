<?php

namespace metaxiii\blog;

class CommentDAO
{

    protected $db;

    public function __construct()
    {
        $this->db = Database::getPdo();
    }

    public function checkComment()
    {
        return $comment = $this->db->query("SELECT * FROM comment WHERE show_comment LIKE '0'")->rowCount();
    }
}
