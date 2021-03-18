<?php
namespace Application\Model;

class City {
    public $id;
    public $name;
    public $slug;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['name'])) ? $data['name'] : null;
        $this->title  = (!empty($data['slug'])) ? $data['slug'] : null;
    }
}


