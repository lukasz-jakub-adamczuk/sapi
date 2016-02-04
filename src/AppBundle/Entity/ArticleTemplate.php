<?php

namespace AppBundle\Entity;

/**
 * ArticleTemplate
 */
class ArticleTemplate
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
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var \DateTime
     */
    private $modificationDate;

    /**
     * @var boolean
     */
    private $idx = '0';

    /**
     * @var boolean
     */
    private $visible = '1';

    /**
     * @var boolean
     */
    private $idArticleTemplate;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return ArticleTemplate
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
     * @return ArticleTemplate
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return ArticleTemplate
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
     * @return ArticleTemplate
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
     * Set idx
     *
     * @param boolean $idx
     *
     * @return ArticleTemplate
     */
    public function setIdx($idx)
    {
        $this->idx = $idx;

        return $this;
    }

    /**
     * Get idx
     *
     * @return boolean
     */
    public function getIdx()
    {
        return $this->idx;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return ArticleTemplate
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
     * Get idArticleTemplate
     *
     * @return boolean
     */
    public function getIdArticleTemplate()
    {
        return $this->idArticleTemplate;
    }
}

