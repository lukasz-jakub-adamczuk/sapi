<?php

namespace AppBundle\Entity;

/**
 * GalleryCategory
 */
class GalleryCategory
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
     * @var integer
     */
    private $idGalleryCategory;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return GalleryCategory
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
     * @return GalleryCategory
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
     * Get idGalleryCategory
     *
     * @return integer
     */
    public function getIdGalleryCategory()
    {
        return $this->idGalleryCategory;
    }
}

