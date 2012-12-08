<?php
namespace cloud\siteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="grado")
 */
class Grado
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="nombre", type="string", length=255)
     * @Assert\NotBlank(message = "Campo Obligatorio")
     * 
     */
    protected $name;
    /**
     * @ORM\ManyToOne(targetEntity="NivelesAcademicos", inversedBy="id")
     * @ORM\JoinColumn(name="nivel_id", referencedColumnName="id")
     * @Assert\NotBlank(message = "Campo Obligatorio")
     */
    protected $nivel_id;

    /**
     * @ORM\OneToMany(targetEntity="Curso", mappedBy="grado_id")
     */
    protected $curso_id;


    public function __toString() {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Jornada
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nivel_id
     *
     * @param cloud\siteBundle\Entity\NivelesAcademicos $nivelId
     * @return Grado
     */
    public function setNivelId(\cloud\siteBundle\Entity\NivelesAcademicos $nivelId = null)
    {
        $this->nivel_id = $nivelId;
    
        return $this;
    }

    /**
     * Get nivel_id
     *
     * @return cloud\siteBundle\Entity\NivelesAcademicos 
     */
    public function getNivelId()
    {
        return $this->nivel_id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->curso_id = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add curso_id
     *
     * @param cloud\siteBundle\Entity\Curso $cursoId
     * @return Grado
     */
    public function addCursoId(\cloud\siteBundle\Entity\Curso $cursoId)
    {
        $this->curso_id[] = $cursoId;
    
        return $this;
    }

    /**
     * Remove curso_id
     *
     * @param cloud\siteBundle\Entity\Curso $cursoId
     */
    public function removeCursoId(\cloud\siteBundle\Entity\Curso $cursoId)
    {
        $this->curso_id->removeElement($cursoId);
    }

    /**
     * Get curso_id
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCursoId()
    {
        return $this->curso_id;
    }
}