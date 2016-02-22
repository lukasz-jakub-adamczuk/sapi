<?php

namespace AppBundle\Entity;

// use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 */
class Article
{
    /**
     * @var integer
     */
    private $idArticleCategory;

    /**
     * @var boolean
     */
    private $idArticleTemplate;

    /**
     * @var integer
     */
    private $idAuthor;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $oldUrl;

    /**
     * @var string
     */
    private $markup;

    /**
     * @var string
     */
    private $markdown;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var \DateTime
     */
    private $modificationDate;

    /**
     * @var integer
     */
    private $rated = '0';

    /**
     * @var integer
     */
    private $sum = '0';

    /**
     * @var integer
     */
    private $views = '0';

    /**
     * @var integer
     */
    private $idx = '0';

    /**
     * @var boolean
     */
    private $verified = '0';

    /**
     * @var boolean
     */
    private $visible = '1';

    /**
     * @var boolean
     */
    private $deleted = '0';

    /**
     * @var integer
     */
    private $idArticle;

    /**
     * @var string
     */
    protected $category;

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set idArticleCategory
     *
     * @param integer $idArticleCategory
     *
     * @return Article
     */
    public function setIdArticleCategory($idArticleCategory)
    {
        $this->idArticleCategory = $idArticleCategory;

        return $this;
    }

    /**
     * Get idArticleCategory
     *
     * @return integer
     */
    public function getIdArticleCategory()
    {
        return $this->idArticleCategory;
    }

    /**
     * Set idArticleTemplate
     *
     * @param boolean $idArticleTemplate
     *
     * @return Article
     */
    public function setIdArticleTemplate($idArticleTemplate)
    {
        $this->idArticleTemplate = $idArticleTemplate;

        return $this;
    }

    /**
     * Get idArticleTemplate
     *
     * @return boolean
     */
    public function getIdArticleTemplate()
    {
        return $this->idArticleTemplate;
    }

    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return Article
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
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Article
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
     * @return Article
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
     * Set markup
     *
     * @param string $markup
     *
     * @return Article
     */
    public function setMarkup($markup)
    {
        $this->markup = $markup;

        return $this;
    }

    /**
     * Get markup
     *
     * @return string
     */
    public function getMarkup()
    {
        return $this->markup;
    }

    /**
     * Set markdown
     *
     * @param string $markdown
     *
     * @return Article
     */
    public function setMarkdown($markdown)
    {
        $this->markdown = $markdown;

        return $this;
    }

    /**
     * Get markdown
     *
     * @return string
     */
    public function getMarkdown()
    {
        return $this->markdown;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Article
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
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     *
     * @return Article
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * Get modificationDate
     *
     * @return \DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * Set rated
     *
     * @param integer $rated
     *
     * @return Article
     */
    public function setRated($rated)
    {
        $this->rated = $rated;

        return $this;
    }

    /**
     * Get rated
     *
     * @return integer
     */
    public function getRated()
    {
        return $this->rated;
    }

    /**
     * Set sum
     *
     * @param integer $sum
     *
     * @return Article
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get sum
     *
     * @return integer
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Set views
     *
     * @param integer $views
     *
     * @return Article
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set idx
     *
     * @param integer $idx
     *
     * @return Article
     */
    public function setIdx($idx)
    {
        $this->idx = $idx;

        return $this;
    }

    /**
     * Get idx
     *
     * @return integer
     */
    public function getIdx()
    {
        return $this->idx;
    }

    /**
     * Set verified
     *
     * @param boolean $verified
     *
     * @return Article
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified
     *
     * @return boolean
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Article
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
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Article
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
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
}
