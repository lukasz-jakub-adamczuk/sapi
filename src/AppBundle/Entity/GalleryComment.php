<?php

namespace AppBundle\Entity;

/**
 * GalleryComment
 */
class GalleryComment
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
    private $comment;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var boolean
     */
    private $visible = '0';

    /**
     * @var integer
     */
    private $idGalleryComment;


    /**
     * Set idGallery
     *
     * @param integer $idGallery
     *
     * @return GalleryComment
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
     * @return GalleryComment
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
     * Set comment
     *
     * @param string $comment
     *
     * @return GalleryComment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return GalleryComment
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
     * Set visible
     *
     * @param boolean $visible
     *
     * @return GalleryComment
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Get idGalleryComment
     *
     * @return integer
     */
    public function getIdGalleryComment()
    {
        return $this->idGalleryComment;
    }
}

