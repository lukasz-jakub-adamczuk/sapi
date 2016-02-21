<?php

namespace AppBundle\Entity;

/**
 * Shout
 */
class Shout
{
    /**
     * @var integer
     */
    private $idAuthor;

    /**
     * @var string
     */
    private $ip = '';

    /**
     * @var string
     */
    private $host = '';

    /**
     * @var string
     */
    private $shout;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var integer
     */
    private $idShout;


    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return Shout
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
     * Set ip
     *
     * @param string $ip
     *
     * @return Shout
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set host
     *
     * @param string $host
     *
     * @return Shout
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set shout
     *
     * @param string $shout
     *
     * @return Shout
     */
    public function setShout($shout)
    {
        $this->shout = $shout;

        return $this;
    }

    /**
     * Get shout
     *
     * @return string
     */
    public function getShout()
    {
        return $this->shout;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Shout
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
     * Get idShout
     *
     * @return integer
     */
    public function getIdShout()
    {
        return $this->idShout;
    }
}
