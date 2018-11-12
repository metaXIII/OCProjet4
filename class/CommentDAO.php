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
        $query = "SELECT * from comment WHERE id_article = :id and show_comment = 1";
        $req = $this->db->prepare($query);
        $req->execute([':id' => $data]);
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function report($data)
    {
        $data = strip_tags(htmlspecialchars($data));
        if (!(int)$data) {
            return;
        } else {
            $query = "UPDATE comment 
                        SET show_comment = 0
                        WHERE id = :id";
            $req = $this->db->prepare($query);
            $req->execute([':id' => $data]);
        }
    }

    public function getReportComment()
    {
        $query = "SELECT *
                    FROM comment
                    WHERE show_comment = 0";
        $req = $this->db->prepare($query);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function rehabilited($data)
    {
        $data = strip_tags(htmlspecialchars($data));
        if ((int)$data) {
            $query = "UPDATE comment
                    SET show_comment = 1
                    WHERE id = :id";
            $req = $this->db->prepare($query);
            $req->execute(['id' => $data]);
        }
        setFlash("Le commentaire a bien été rajouté", "success");
        header("location:" . ROOT . "admin");
        die();
    }

    public function delete($data)
    {
        $this->db->exec("DELETE FROM comment WHERE id = $data");
        setFlash("Le commentaire a bien été supprimé", "success");
        header("location:" . ROOT . "admin");
        die();
    }
}
