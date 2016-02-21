<?php

namespace AppBundle\Entity;

/**
 * ArticleVerdict
 */
class ArticleVerdict
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
    private $verdict;

    /**
     * @var string
     */
    private $features;

    /**
     * @var boolean
     */
    private $rating = '0';

    /**
     * @var string
     */
    private $sign = '';

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
    private $idArticleVerdict;


    /**
     * Set idArticle
     *
     * @param integer $idArticle
     *
     * @return ArticleVerdict
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
     * @return ArticleVerdict
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
     * Set verdict
     *
     * @param string $verdict
     *
     * @return ArticleVerdict
     */
    public function setVerdict($verdict)
    {
        $this->verdict = $verdict;

        return $this;
    }

    /**
     * Get verdict
     *
     * @return string
     */
    public function getVerdict()
    {
        return $this->verdict;
    }

    /**
     * Set features
     *
     * @param string $features
     *
     * @return ArticleVerdict
     */
    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Get features
     *
     * @return string
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Set rating
     *
     * @param boolean $rating
     *
     * @return ArticleVerdict
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return boolean
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set sign
     *
     * @param string $sign
     *
     * @return ArticleVerdict
     */
    public function setSign($sign)
    {
        $this->sign = $sign;

        return $this;
    }

    /**
     * Get sign
     *
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return ArticleVerdict
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
     * @return ArticleVerdict
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
     * Get idArticleVerdict
     *
     * @return integer
     */
    public function getIdArticleVerdict()
    {
        return $this->idArticleVerdict;
    }
}
