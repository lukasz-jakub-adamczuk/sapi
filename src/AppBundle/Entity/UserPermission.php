<?php

namespace AppBundle\Entity;

/**
 * UserPermission
 */
class UserPermission
{
    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var boolean
     */
    private $idPermission;

    /**
     * @var integer
     */
    private $idUserPermission;


    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return UserPermission
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idPermission
     *
     * @param boolean $idPermission
     *
     * @return UserPermission
     */
    public function setIdPermission($idPermission)
    {
        $this->idPermission = $idPermission;

        return $this;
    }

    /**
     * Get idPermission
     *
     * @return boolean
     */
    public function getIdPermission()
    {
        return $this->idPermission;
    }

    /**
     * Get idUserPermission
     *
     * @return integer
     */
    public function getIdUserPermission()
    {
        return $this->idUserPermission;
    }
}
