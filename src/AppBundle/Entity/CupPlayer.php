<?php

namespace AppBundle\Entity;

/**
 * CupPlayer
 */
class CupPlayer
{
    /**
     * @var boolean
     */
    private $idCup = '0';

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $slug = '';

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $group = '';

    /**
     * @var boolean
     */
    private $battles = '0';

    /**
     * @var integer
     */
    private $points = '0';

    /**
     * @var integer
     */
    private $won = '0';

    /**
     * @var integer
     */
    private $lost = '0';

    /**
     * @var integer
     */
    private $idCupPlayer;


    /**
     * Set idCup
     *
     * @param boolean $idCup
     *
     * @return CupPlayer
     */
    public function setIdCup($idCup)
    {
        $this->idCup = $idCup;

        return $this;
    }

    /**
     * Get idCup
     *
     * @return boolean
     */
    public function getIdCup()
    {
        return $this->idCup;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CupPlayer
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
     * @return CupPlayer
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
     * Set description
     *
     * @param string $description
     *
     * @return CupPlayer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set group
     *
     * @param string $group
     *
     * @return CupPlayer
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set battles
     *
     * @param boolean $battles
     *
     * @return CupPlayer
     */
    public function setBattles($battles)
    {
        $this->battles = $battles;

        return $this;
    }

    /**
     * Get battles
     *
     * @return boolean
     */
    public function getBattles()
    {
        return $this->battles;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return CupPlayer
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set won
     *
     * @param integer $won
     *
     * @return CupPlayer
     */
    public function setWon($won)
    {
        $this->won = $won;

        return $this;
    }

    /**
     * Get won
     *
     * @return integer
     */
    public function getWon()
    {
        return $this->won;
    }

    /**
     * Set lost
     *
     * @param integer $lost
     *
     * @return CupPlayer
     */
    public function setLost($lost)
    {
        $this->lost = $lost;

        return $this;
    }

    /**
     * Get lost
     *
     * @return integer
     */
    public function getLost()
    {
        return $this->lost;
    }

    /**
     * Get idCupPlayer
     *
     * @return integer
     */
    public function getIdCupPlayer()
    {
        return $this->idCupPlayer;
    }
}

