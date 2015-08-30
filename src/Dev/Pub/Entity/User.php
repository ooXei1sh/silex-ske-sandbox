<?php

namespace Dev\Pub\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @Table(name="user")
 * @Entity()
 */
class User implements UserInterface, \Serializable
{
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @Column(name="roles", type="string", length=255)
     */
    private $roles;

    /**
     * __construct
     */
    public function __construct($id = null, $username = null, $password = null, $roles = array())
    {
        if (isset($id) && isset($username)){
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->roles = $roles;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function addRole($role)
    {
        $this->roles = $role;

        return $this;
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->roles
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->roles
        ) = unserialize($serialized);
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set roles
     *
     * @param string $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
