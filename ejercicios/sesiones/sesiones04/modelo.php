<?php


class Usuario
{
    public $nombre = "";
    public $apellidos = "";
    public $email = "";
    public $password = "";
    public $imagen = "";

    public function __construct()
    {
        $this->imagen = "default.png";
    }
}
