<?php

namespace AppBundle\Entity;

/**
 * GalleryImage
 */
class GalleryImage
{
    /**
     * @var integer
     */
    private $idGallery;

    /**
     * @var integer
     */
    private $idAuthor;

    /**
     * @var string
     */
    private $about;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var integer
     */
    private $width;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $mime;

    /**
     * @var integer
     */
    private $idGalleryImage;


    /**
     * Set idGallery
     *
     * @param integer $idGallery
     *
     * @return GalleryImage
     */
    public function setIdGallery($idGallery)
    {
        $this->idGallery = $idGallery;

        return $this;
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

    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return GalleryImage
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
     * Set about
     *
     * @param string $about
     *
     * @return GalleryImage
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return GalleryImage
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
     * Set width
     *
     * @param integer $width
     *
     * @return GalleryImage
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return GalleryImage
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return GalleryImage
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
     * Set mime
     *
     * @param string $mime
     *
     * @return GalleryImage
     */
    public function setMime($mime)
    {
        $this->mime = $mime;

        return $this;
    }

    /**
     * Get mime
     *
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * Get idGalleryImage
     *
     * @return integer
     */
    public function getIdGalleryImage()
    {
        return $this->idGalleryImage;
    }
}

