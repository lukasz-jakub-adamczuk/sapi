<?php

namespace AppBundle\Entity;

/**
 * ChangeLog
 */
class ChangeLog
{
    /**
     * @var integer
     */
    private $idAuthor;

    /**
     * @var integer
     */
    private $idRecord;

    /**
     * @var string
     */
    private $table;

    /**
     * @var string
     */
    private $log;

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
    private $idChangeLog;


    /**
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return ChangeLog
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
     * Set idRecord
     *
     * @param integer $idRecord
     *
     * @return ChangeLog
     */
    public function setIdRecord($idRecord)
    {
        $this->idRecord = $idRecord;

        return $this;
    }

    /**
     * Get idRecord
     *
     * @return integer
     */
    public function getIdRecord()
    {
        return $this->idRecord;
    }

    /**
     * Set table
     *
     * @param string $table
     *
     * @return ChangeLog
     */
    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Get table
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set log
     *
     * @param string $log
     *
     * @return ChangeLog
     */
    public function setLog($log)
    {
        $this->log = $log;

        return $this;
    }

    /**
     * Get log
     *
     * @return string
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return ChangeLog
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
     * @return ChangeLog
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
     * Get idChangeLog
     *
     * @return integer
     */
    public function getIdChangeLog()
    {
        return $this->idChangeLog;
    }
}
