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
        $query = "SELECT slug, titre, content, DATE_FORMAT(date_article, '%d/%m/%Y') as date FROM article ORDER BY id DESC LIMIT 10";
        $req = $this->db->prepare($query);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get($slug) {
        $slug = strip_tags(trim($slug));
        $query = "SELECT slug, titre, content, DATE_FORMAT(date_article, '%d/%m/%Y') as date FROM article
                  WHERE slug LIKE :slug LIMIT 1";
        $req = $this->db->prepare($query);
        $req->execute([':slug' => $slug]);
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }


}
