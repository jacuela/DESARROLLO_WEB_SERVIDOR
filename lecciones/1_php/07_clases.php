<?php

class Persona
{
    private $DNI;
    private $nombre;
    private $apellido;
    function __construct($DNI, $nombre, $apellido)
    {
        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function __toString()
    {
        //return "Persona: " . $this->nombre . " " . $this->apellido."  [DNI:".$this->DNI."]";
        return "Persona: $this->nombre $this->apellido &nbsp&nbsp[DNI:$this->DNI]";
    }
}

// crear una persona
$per = new Persona("1111111A", "Ana", "Puertas");
// mostrarla, usa el método __toString()
print $per . "<br>";
// cambiar el apellido
$per->setApellido("Montes");
// volver a mostrar
print $per . "<br>";
