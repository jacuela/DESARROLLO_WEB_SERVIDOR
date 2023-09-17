<?php
// src/Entity/Restaurante.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity @ORM\Table(name="restaurantes")
 */
class Restaurante implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="CodRes")
     */
    private $codRes;
    /**
     * @ORM\Column(type="string", name = "Correo")
     */
    private $correo;
    /**
     * @ORM\Column(type="string", name = "Clave")
     */
    private $clave;
    /**
     * @ORM\Column(type="string",  name = "Pais")
     */
    private $pais;
    /**
     * @ORM\Column(type="string",  name = "CP")
     */
    private $CP;
    /**
     * @ORM\Column(type="string", name = "Ciudad")
     */
    private $ciudad;
    /**
     * @ORM\Column(type="string",  name = "Direccion")
     */
    private $direccion;
    /**
     * @ORM\Column(type="integer",  name = "rol")
     */
    private $rol;
    public function getRol(){
        return $this->rol;
    }
    /**
     * @param mixed $rol
     */
    public function setRol($rol){
        $this->rol = $rol;
    }

    public function getCodRes(){
        return $this->codRes;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    public function getClave(){
        return $this->clave;
    }
    public function setClave($clave){
        $this->clave = $clave;
    }
    public function getPais(){
        return $this->pais;
    }
    public function setPais($pais){
        $this->pais = $pais;
    }
	public function getCP(){
        return $this->CP;
    }

    public function setCP($CP) {
        $this->CP = $CP;
    }

    public function getCiudad(){
        return $this->ciudad;
    }
    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function serialize(){
        return serialize(array(
            $this->codRes,
            $this->correo,
            $this->clave,
        ));
    }
    public function unserialize($serialized){
        list (
            $this->codRes,
            $this->correo,
            $this->clave,
            ) = unserialize($serialized);
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function getRoles(){
        return array('ROLE_USER');        
    }
    public function getPassword(){
        return $this->getClave();
    }
    public function getSalt(){
        return;
    }
    public function getUsername(){
        return $this->getCorreo();
    }
    public function eraseCredentials(){
        return;
    }
}