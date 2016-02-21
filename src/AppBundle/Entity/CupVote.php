<?php

namespace AppBundle\Entity;

/**
 * CupVote
 */
class CupVote
{
    /**
     * @var integer
     */
    private $idUser = '0';

    /**
     * @var \DateTime
     */
    private $votingDate = '0000-00-00';

    /**
     * @var integer
     */
    private $idCupVote;


    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return CupVote
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set votingDate
     *
     * @param \DateTime $votingDate
     *
     * @return CupVote
     */
    public function setVotingDate($votingDate)
    {
        $this->votingDate = $votingDate;

        return $this;
    }

    /**
     * Get votingDate
     *
     * @return \DateTime
     */
    public function getVotingDate()
    {
        return $this->votingDate;
    }

    /**
     * Get idCupVote
     *
     * @return integer
     */
    public function getIdCupVote()
    {
        return $this->idCupVote;
    }
}
