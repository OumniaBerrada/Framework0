<?php

namespace Projet0\Homepage\LoginBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Projet0\Homepage\LoginBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @var string
     * @Assert\Length(max = 8)
     * @Assert\Length(min = 1)
     * @ORM\Column(name="firstname", type="text")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="text")
     * @Assert\Length(min = 2)
     */
    private $lastname;

    public function __construct()
    {
        parent::__construct();
        $this->addRole('ROLE_USER');
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
     * @return User
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
     * Set firtname
     *
     * @param string $firtname
     * @return User
     */
    public function setFirtname($firtname)
    {
        $this->firtname = $firtname;

        return $this;
    }

    /**
     * Get firtname
     *
     * @return string 
     */
    public function getFirtname()
    {
        return $this->firtname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
}
