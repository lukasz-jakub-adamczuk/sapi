<?php

namespace AppBundle\Entity;

/**
 * ObjectFragment
 */
class ObjectFragment
{
    /**
     * @var integer
     */
    private $idFragment;

    /**
     * @var integer
     */
    private $idObject;

    /**
     * @var string
     */
    private $object = '';

    /**
     * @var integer
     */
    private $idObjectFragment;


    /**
     * Set idFragment
     *
     * @param integer $idFragment
     *
     * @return ObjectFragment
     */
    public function setIdFragment($idFragment)
    {
        $this->idFragment = $idFragment;

        return $this;
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

    /**
     * Set idObject
     *
     * @param integer $idObject
     *
     * @return ObjectFragment
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
     * @return ObjectFragment
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
     * Get idObjectFragment
     *
     * @return integer
     */
    public function getIdObjectFragment()
    {
        return $this->idObjectFragment;
    }
}

