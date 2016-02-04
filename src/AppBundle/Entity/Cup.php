<?php

namespace AppBundle\Entity;

/**
 * Cup
 */
class Cup
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $slug = '';

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $idCup;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Cup
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
     * @return Cup
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
     * Set description
     *
     * @param string $description
     *
     * @return Cup
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get idCup
     *
     * @return integer
     */
    public function getIdCup()
    {
        return $this->idCup;
    }
}

