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
        $query = "SELECT slug, titre, content, DATE_FORMAT(date_article, '%d/%m/%Y') as date FROM article LIMIT 10";
        $req = $this->db->prepare($query);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }


}
