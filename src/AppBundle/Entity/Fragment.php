<?php

namespace AppBundle\Entity;

/**
 * Fragment
 */
class Fragment
{
    /**
     * @var integer
     */
    private $idFragmentType;

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
    private $fragment;

    /**
     * @var string
     */
    private $params;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var integer
     */
    private $idFragment;


    /**
     * Set idFragmentType
     *
     * @param integer $idFragmentType
     *
     * @return Fragment
     */
    public function setIdFragmentType($idFragmentType)
    {
        $this->idFragmentType = $idFragmentType;

        return $this;
    }

    /**
     * Get idFragmentType
     *
     * @return integer
     */
    public function getIdFragmentType()
    {
        return $this->idFragmentType;
    }

    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return Fragment
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
     * @return Fragment
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
     * Set fragment
     *
     * @param string $fragment
     *
     * @return Fragment
     */
    public function setFragment($fragment)
    {
        $this->fragment = $fragment;

        return $this;
    }

    /**
     * Get fragment
     *
     * @return string
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * Set params
     *
     * @param string $params
     *
     * @return Fragment
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params
     *
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Fragment
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
     * Get idFragment
     *
     * @return integer
     */
    public function getIdFragment()
    {
        return $this->idFragment;
    }
}

