<?php

namespace AngryMoustache\Rambo\Cards;

class Card
{
    public $data;

    public $component;

    public function __construct()
    {
        $this->data = $this->getData();
    }

    public function render()
    {
        return view($this->component);
    }

    public function getData()
    {
        return null;
    }
}
