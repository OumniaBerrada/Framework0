<?php
namespace Projet0\Homepage\LoginBundle\Entity;
use FOS\UserBundle\Entity\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_group")
 */
class Group extends BaseGroup
{
    const defaultRole = 'ROLE_USER';
    const defaultGroup = 'GROUP_STUDENT';
    public static $rolesChoices = array(
        'ROLE_USER' => 'ROLE_USER',
        'ROLE_ADMIN' => 'ROLE_ADMIN'
    );
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    public function __construct($name = '', $roles = array())
    {
        $this->name = $name;
        $this->roles = array(Group::defaultRole);
    }
    public function __toString(){
        return $this->name;
    }
}
