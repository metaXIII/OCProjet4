<?php

namespace metaxiii\blog;

class Form
{

    public $surrond = 'p';

    private function surrond($html)
    {
        return "<{$this->surrond}>{$html}</{$this->surrond}>";
    }

    public function input($data)
    {
        return $this->surrond("<input type='text' placeholder='$data' name='$data'>", 'p');
    }

    public function submit()
    {
        return $this->surrond("<button type='submit'>Envoyer</button>", 'p');
    }
}


