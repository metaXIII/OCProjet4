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
        return "<{$this->surrond} class='form-group text-center'>{$html}</{$this->surrond}>";
    }

    private function label($data) {
        return "<label for='$data' id='{$data}Label'></label>";
    }

    public function input($data)
    {
        return $this->surrond($this->label($data) ."<input type='text' name='$data' id='$data' class='form-control'>");
    }

    public function submit()
    {
        return $this->surrond("<button type='submit' class='btn btn-primary mt-2'>Se connecter</button>", 'p');
    }

    public function password(string $data)
    {
        return $this->surrond($this->label($data) ."<input type='password' name='$data' id='$data' class='form-control'>");
    }
}


