<?php

namespace AppBundle\Entity;

/**
 * UserMeta
 */
class UserMeta
{
    /**
     * @var integer
     */
    private $idUser = '0';

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $value;

    /**
     * @var integer
     */
    private $idUserMeta;


    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return UserMeta
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
     * Set slug
     *
     * @param string $slug
     *
     * @return UserMeta
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return UserMeta
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get idUserMeta
     *
     * @return integer
     */
    public function getIdUserMeta()
    {
        return $this->idUserMeta;
    }
}

