<?php

namespace AppBundle\Entity;

/**
 * ArticleComment
 */
class ArticleComment
{
    /**
     * @var integer
     */
    private $idArticle;

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
    private $idArticleComment;


    /**
     * Set idArticle
     *
     * @param integer $idArticle
     *
     * @return ArticleComment
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return integer
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return ArticleComment
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
     * @return ArticleComment
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
     * @return ArticleComment
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
     * @return ArticleComment
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
     * Get idArticleComment
     *
     * @return integer
     */
    public function getIdArticleComment()
    {
        return $this->idArticleComment;
    }
}

