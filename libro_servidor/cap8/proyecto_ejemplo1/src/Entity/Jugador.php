<?php
// src/Entity/Jugador.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity @ORM\Table(name="jugador")
 **/
class Jugador
{
	/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;
    /** @ORM\Column(type="string") **/
    private $nombre;
	/** @ORM\Column(type="string") **/
	private $apellidos;
	/** @ORM\Column(type="integer") **/
	private $edad;
	/**
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumn(name="equipo", referencedColumnName="id")
     **/
	private $equipo;
	
	public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
	public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
	public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }	
	public function getEquipo()
    {
        return $this->equipo;
    }

    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;
    }		
}
	