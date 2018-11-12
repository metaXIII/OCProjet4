<?php

namespace metaxiii\blog;

class Comment {
    private $id,
            $user,
            $content,
            $id_Article,
            $show_comment;

    public function __construct(array $data = null)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_Article;
    }

    /**
     * @param mixed $id_Article
     */
    public function setIdArticle($id_Article)
    {
        $this->id_Article = $id_Article;
    }

    /**
     * @return mixed
     */
    public function getShowComment()
    {
        return $this->show_comment;
    }

    /**
     * @param mixed $show_comment
     */
    public function setShowComment($show_comment)
    {
        $this->show_comment = $show_comment;
    }
}
