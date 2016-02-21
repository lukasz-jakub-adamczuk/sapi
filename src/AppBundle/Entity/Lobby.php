<?php

namespace AppBundle\Entity;

/**
 * Lobby
 */
class Lobby
{
    /**
     * @var integer
     */
    private $idAuthor;

    /**
     * @var integer
     */
    private $idObject;

    /**
     * @var string
     */
    private $object;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $markdown;

    /**
     * @var string
     */
    private $markup;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var string
     */
    private $type;

    /**
     * @var integer
     */
    private $idLobby;


    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return Lobby
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
     * Set idObject
     *
     * @param integer $idObject
     *
     * @return Lobby
     */
    public function setIdObject($idObject)
    {
        $this->idObject = $idObject;

        return $this;
    }

    /**
     * Get idObject
     *
     * @return integer
     */
    public function getIdObject()
    {
        return $this->idObject;
    }

    /**
     * Set object
     *
     * @param string $object
     *
     * @return Lobby
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object
     *
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Lobby
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
     * Set markdown
     *
     * @param string $markdown
     *
     * @return Lobby
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
     * Set markup
     *
     * @param string $markup
     *
     * @return Lobby
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Lobby
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
     * Set type
     *
     * @param string $type
     *
     * @return Lobby
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get idLobby
     *
     * @return integer
     */
    public function getIdLobby()
    {
        return $this->idLobby;
    }
}
