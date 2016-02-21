<?php

namespace AppBundle\Entity;

/**
 * FragmentType
 */
class FragmentType
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $idFragmentType;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return FragmentType
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
     * Get idFragmentType
     *
     * @return integer
     */
    public function getIdFragmentType()
    {
        return $this->idFragmentType;
    }
}
