<?php
// src/Entity/Categoria.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity @ORM\Table(name="categorias")
 */
class Categoria {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="CodCat")
     */
    private $codCat;
    /**
     * @ORM\Column(type="string")
     */
    private $nombre;
    /**
     * @ORM\Column(type="string")
     */
    private $descripcion;
    /**
     * Bidireccional
	* @ORM\OneToMany(targetEntity="Producto", mappedBy="categoria")
	*/
    private $productos;
    public function getCodCat() {
        return $this->codCat;
    }
    public function getProductos() {
        return $this->productos;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}