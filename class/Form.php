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

    private function label($data)
    {
        return "<label for='$data' id='{$data}Label'></label>";
    }

    public function input($data, $content = null)
    {
        return $this->surrond($this->label($data) .
            "<input type='text' name='$data' id='$data' class='form-control' value='$content'>");
    }

    public function submit($message)
    {
        return $this->surrond("<button type='submit' class='btn btn-primary mt-2'>$message</button>", 'p');
    }

    public function password(string $data)
    {
        return $this->surrond($this->label($data) . "<input type='password' name='$data' id='$data' class='form-control'>");
    }

    public function textarea($data, $content = null)
    {
        return $this->surrond("<textarea name='$data' id='$data' cols='30' rows='20'>$content</textarea>");
    }

    public function hidden ($data) {
        return "<input type='hidden' value='$data' name='url'>";
    }
}


