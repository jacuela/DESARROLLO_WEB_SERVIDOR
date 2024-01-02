<?php


class Usuario
{
    public $nombre = "";
    public $password = "";
    public $imagen = "";

    public function __construct()
    {
        $this->imagen = "default.png";
    }
}
