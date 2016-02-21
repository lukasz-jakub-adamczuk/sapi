<?php

namespace AppBundle\Entity;

/**
 * Story
 */
class Story
{
    /**
     * @var boolean
     */
    private $idStoryCategory;

    /**
     * @var integer
     */
    private $idArticleCategory;

    /**
     * @var integer
     */
    private $idAuthor;

    /**
     * @var boolean
     */
    private $idTemplate;

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
    private $idStory;


    /**
     * Set idStoryCategory
     *
     * @param boolean $idStoryCategory
     *
     * @return Story
     */
    public function setIdStoryCategory($idStoryCategory)
    {
        $this->idStoryCategory = $idStoryCategory;

        return $this;
    }

    /**
     * Get idStoryCategory
     *
     * @return boolean
     */
    public function getIdStoryCategory()
    {
        return $this->idStoryCategory;
    }

    /**
     * Set idArticleCategory
     *
     * @param integer $idArticleCategory
     *
     * @return Story
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
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return Story
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
     * Set idTemplate
     *
     * @param boolean $idTemplate
     *
     * @return Story
     */
    public function setIdTemplate($idTemplate)
    {
        $this->idTemplate = $idTemplate;

        return $this;
    }

    /**
     * Get idTemplate
     *
     * @return boolean
     */
    public function getIdTemplate()
    {
        return $this->idTemplate;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * @return Story
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
     * Get idStory
     *
     * @return integer
     */
    public function getIdStory()
    {
        return $this->idStory;
    }
}
