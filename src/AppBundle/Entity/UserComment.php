<?php

namespace AppBundle\Entity;

/**
 * UserComment
 */
class UserComment
{
    /**
     * @var integer
     */
    private $idUser;

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
    private $idUserComment;


    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return UserComment
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
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return UserComment
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
     * @return UserComment
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
     * @return UserComment
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
     * @return UserComment
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
     * Get idUserComment
     *
     * @return integer
     */
    public function getIdUserComment()
    {
        return $this->idUserComment;
    }
}

