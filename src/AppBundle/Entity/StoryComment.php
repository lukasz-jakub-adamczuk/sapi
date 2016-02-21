<?php

namespace AppBundle\Entity;

/**
 * StoryComment
 */
class StoryComment
{
    /**
     * @var integer
     */
    private $idStory;

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
    private $idStoryComment;


    /**
     * Set idStory
     *
     * @param integer $idStory
     *
     * @return StoryComment
     */
    public function setIdStory($idStory)
    {
        $this->idStory = $idStory;

        return $this;
    }

    /**
     * Get idStory
     *
     * @return integer
     */
    public function getIdStory()
    {
        return $this->idStory;
    }

    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return StoryComment
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
     * @return StoryComment
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
     * @return StoryComment
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
     * @return StoryComment
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
     * Get idStoryComment
     *
     * @return integer
     */
    public function getIdStoryComment()
    {
        return $this->idStoryComment;
    }
}
