<?php

namespace metaxiii\blog;

class Form
{

    public $surrond = 'div';
    private $data;

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    private function surrond($html)
    {
        return "<{$this->surrond} class='form-group'>{$html}</{$this->surrond}>";
    }

    public function input($data)
    {
        return $this->surrond("<input type='text' name='$data' class='form-control'>");
    }

    public function submit()
    {
        return $this->surrond("<button type='submit'>Envoyer</button>", 'p');
    }
}


