<?php

namespace AppBundle\Entity;

/**
 * Gallery
 */
class Gallery
{
    /**
     * @var integer
     */
    private $idGalleryCategory;

    /**
     * @var integer
     */
    private $idAuthor;

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
    private $oldUrl;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var integer
     */
    private $idGallery;


    /**
     * Set idGalleryCategory
     *
     * @param integer $idGalleryCategory
     *
     * @return Gallery
     */
    public function setIdGalleryCategory($idGalleryCategory)
    {
        $this->idGalleryCategory = $idGalleryCategory;

        return $this;
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

    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return Gallery
     */
    public function setIdAuthor($idAuthor)
    {
        $this->idAuthor = $idAuthor;

        return $this;
    }

    /**
     * Get idAuthor
     *
     * @return integer
     */
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Gallery
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
     * @return Gallery
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
     * Set oldUrl
     *
     * @param string $oldUrl
     *
     * @return Gallery
     */
    public function setOldUrl($oldUrl)
    {
        $this->oldUrl = $oldUrl;

        return $this;
    }

    /**
     * Get oldUrl
     *
     * @return string
     */
    public function getOldUrl()
    {
        return $this->oldUrl;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Gallery
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Get idGallery
     *
     * @return integer
     */
    public function getIdGallery()
    {
        return $this->idGallery;
    }
}

