<?php

namespace AppBundle\Entity;

/**
 * Permission
 */
class Permission
{
    /**
     * @var boolean
     */
    private $idPermissionGroup;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $value;

    /**
     * @var boolean
     */
    private $idx = '0';

    /**
     * @var boolean
     */
    private $idPermission;


    /**
     * Set idPermissionGroup
     *
     * @param boolean $idPermissionGroup
     *
     * @return Permission
     */
    public function setIdPermissionGroup($idPermissionGroup)
    {
        $this->idPermissionGroup = $idPermissionGroup;

        return $this;
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Permission
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
     * @return Permission
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
     * @return Permission
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
     * Set idx
     *
     * @param boolean $idx
     *
     * @return Permission
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
     * Get idPermission
     *
     * @return boolean
     */
    public function getIdPermission()
    {
        return $this->idPermission;
    }
}

