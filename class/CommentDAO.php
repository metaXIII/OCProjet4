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

    public function add($data = array())
    {
        $name = "";
        $commentaire = "";
        $url = 0;
        var_dump($data);
        extract($data);
        $name = htmlspecialchars(strip_tags($name));
        $commentaire = htmlspecialchars(strip_tags($commentaire));
        $url = (int)$url;
        if (!empty($name) && !empty($commentaire)) {
            $query = "INSERT INTO comment (user, content, id_article)
                      VALUES (:user, :content, :id)";
            $req = $this->db->prepare($query);
            $req->bindValue(":user", $name);
            $req->bindValue(":content", $commentaire);
            $req->bindValue(":id", $url);
            $req->execute();
        }
    }

    public function getComment($data)
    {

    }
}
