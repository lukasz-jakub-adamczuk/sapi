<?php

namespace AppBundle\Entity;

/**
 * PermissionGroup
 */
class PermissionGroup
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var boolean
     */
    private $idx = '0';

    /**
     * @var boolean
     */
    private $idPermissionGroup;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return PermissionGroup
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
     * Set slug
     *
     * @param string $slug
     *
     * @return PermissionGroup
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
     * Set idx
     *
     * @param boolean $idx
     *
     * @return PermissionGroup
     */
    public function setIdx($idx)
    {
        $this->idx = $idx;

        return $this;
    }

    /**
     * Get idx
     *
     * @return boolean
     */
    public function getIdx()
    {
        return $this->idx;
    }

    /**
     * Get idPermissionGroup
     *
     * @return boolean
     */
    public function getIdPermissionGroup()
    {
        return $this->idPermissionGroup;
    }
}
