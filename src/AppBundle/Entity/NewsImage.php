<?php

namespace AppBundle\Entity;

/**
 * NewsImage
 */
class NewsImage
{
    /**
     * @var integer
     */
    private $idNews;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $mime;

    /**
     * @var integer
     */
    private $idNewsImage;


    /**
     * Set idNews
     *
     * @param integer $idNews
     *
     * @return NewsImage
     */
    public function setIdNews($idNews)
    {
        $this->idNews = $idNews;

        return $this;
    }

    /**
     * Get idNews
     *
     * @return integer
     */
    public function getIdNews()
    {
        return $this->idNews;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return NewsImage
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
     * Set mime
     *
     * @param string $mime
     *
     * @return NewsImage
     */
    public function setMime($mime)
    {
        $this->mime = $mime;

        return $this;
    }

    /**
     * Get mime
     *
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * Get idNewsImage
     *
     * @return integer
     */
    public function getIdNewsImage()
    {
        return $this->idNewsImage;
    }
}

