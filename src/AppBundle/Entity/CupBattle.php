<?php

namespace AppBundle\Entity;

/**
 * CupBattle
 */
class CupBattle
{
    /**
     * @var boolean
     */
    private $idCup = '0';

    /**
     * @var integer
     */
    private $player1 = '0';

    /**
     * @var integer
     */
    private $player2 = '0';

    /**
     * @var integer
     */
    private $score1 = '0';

    /**
     * @var integer
     */
    private $score2 = '0';

    /**
     * @var \DateTime
     */
    private $idCupBattle;


    /**
     * Set idCup
     *
     * @param boolean $idCup
     *
     * @return CupBattle
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
     * Set player1
     *
     * @param integer $player1
     *
     * @return CupBattle
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;

        return $this;
    }

    /**
     * Get player1
     *
     * @return integer
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * Set player2
     *
     * @param integer $player2
     *
     * @return CupBattle
     */
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;

        return $this;
    }

    /**
     * Get player2
     *
     * @return integer
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * Set score1
     *
     * @param integer $score1
     *
     * @return CupBattle
     */
    public function setScore1($score1)
    {
        $this->score1 = $score1;

        return $this;
    }

    /**
     * Get score1
     *
     * @return integer
     */
    public function getScore1()
    {
        return $this->score1;
    }

    /**
     * Set score2
     *
     * @param integer $score2
     *
     * @return CupBattle
     */
    public function setScore2($score2)
    {
        $this->score2 = $score2;

        return $this;
    }

    /**
     * Get score2
     *
     * @return integer
     */
    public function getScore2()
    {
        return $this->score2;
    }

    /**
     * Get idCupBattle
     *
     * @return \DateTime
     */
    public function getIdCupBattle()
    {
        return $this->idCupBattle;
    }
}
