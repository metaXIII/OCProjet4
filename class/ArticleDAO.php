<?php

namespace metaxiii\blog;

class ArticleDAO
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getPdo();
    }

    //CRUD
    public function getAll()
    {
        $query = "SELECT slug, title, content, DATE_FORMAT(date_article, '%d/%m/%Y') as date 
                    FROM article
                    ORDER BY id DESC LIMIT 10";
        $req = $this->db->prepare($query);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get($slug)
    {
        $slug = strip_tags(trim($slug));
        $query = "SELECT id, slug, title, content, DATE_FORMAT(date_article, '%d/%m/%Y') as date FROM article
                  WHERE slug LIKE :slug LIMIT 1";
        $req = $this->db->prepare($query);
        $req->execute([':slug' => $slug]);
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public function add($data = array())
    {
        $Titre = "";
        $adminTextarea = "";
        extract($data);
        $regex = '#[^a-zA-Z\ds:]#';
        $slug = strtolower(preg_replace($regex, "-", str_replace(" ", "-", rtrim($Titre))));
        while (strpos($slug, '--')) {
            $slug = str_replace("--", "-", $slug);
        }
        $verif = $this->get($slug);
        //Création d'article
        if (!$verif) {
            $query = "INSERT INTO article (slug, title, content, date_article) 
              VALUES (:slug, :titre, :content, NOW())";
            $req = $this->db->prepare($query);
            $req->bindValue(':slug', $slug);
            $req->bindValue(':titre', $Titre);
            $req->bindValue(':content', $adminTextarea);
            $req->execute();
        }
    }

    public function update($data = array())
    {
        $Titre = "";
        $adminTextarea = "";
        $url = "";
        extract($data);
        $regex = '#[^a-zA-Z\ds:]#';
        $slug = strtolower(preg_replace($regex, "-", str_replace(" ", "-", rtrim($Titre))));
        while (strpos($slug, '--')) {
            $slug = str_replace("--", "-", $slug);
        }
        $verif = $this->get($slug);
        if ($url === $slug) {
            $query = "UPDATE article
                        SET slug = :slug,
                        title = :title,
                        content = :content
                        WHERE slug = :url";
            $req = $this->db->prepare($query);
            $req->bindValue(':slug', $slug);
            $req->bindValue(':title', $Titre);
            $req->bindValue(':content', $adminTextarea);
            $req->bindValue(':url', $url);
            $req->execute();
            setFlash("L'article a bien été modifié","success");
            header("location:" . ROOT ."admin");
            die();
        } else {
            $query = "UPDATE article
                        SET title = :title,
                        content = :content
                        WHERE slug = :url";
            $req = $this->db->prepare($query);
            $req->bindValue(':title', $Titre);
            $req->bindValue(':content', $adminTextarea);
            $req->bindValue(':url', $url);
            $req->execute();
            setFlash("L'article a bien été modifié","success");
            header("location:" . ROOT ."admin");
            die();
        }
    }

    public function delete($data) {
        var_dump($data);
        $this->db->exec("DELETE FROM article WHERE slug = '$data'");
        setFlash("L'article a bien été supprimé","success");
        header("location:" . ROOT ."admin");
        die();
    }
}
