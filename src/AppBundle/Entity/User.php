<?php

namespace AppBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var boolean
     */
    private $idUserGroup = '0';

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var string
     */
    private $realName;

    /**
     * @var \DateTime
     */
    private $registerDate;

    /**
     * @var \DateTime
     */
    private $lastVisitDate;

    /**
     * @var boolean
     */
    private $active = '0';

    /**
     * @var string
     */
    private $szPerm;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var News[]
     */
    protected $news;

    /**
     * @var Article[]
     */
    protected $articles;

    public function __construct()
    {
        $this->news = new ArrayCollection();
        $this->articles = new ArrayCollection();
    }

    /**
     * Get news list
     *
     * @return ArrayCollection
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Get articles list
     *
     * @return ArrayCollection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set idUserGroup
     *
     * @param boolean $idUserGroup
     *
     * @return User
     */
    public function setIdUserGroup($idUserGroup)
    {
        $this->idUserGroup = $idUserGroup;

        return $this;
    }

    /**
     * Get idUserGroup
     *
     * @return boolean
     */
    public function getIdUserGroup()
    {
        return $this->idUserGroup;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set hash
     *
     * @param string $hash
     *
     * @return User
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set secret
     *
     * @param string $secret
     *
     * @return User
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * Get secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * @return User
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
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set realName
     *
     * @param string $realName
     *
     * @return User
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;

        return $this;
    }

    /**
     * Get realName
     *
     * @return string
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     *
     * @return User
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set lastVisitDate
     *
     * @param \DateTime $lastVisitDate
     *
     * @return User
     */
    public function setLastVisitDate($lastVisitDate)
    {
        $this->lastVisitDate = $lastVisitDate;

        return $this;
    }

    /**
     * Get lastVisitDate
     *
     * @return \DateTime
     */
    public function getLastVisitDate()
    {
        return $this->lastVisitDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set szPerm
     *
     * @param string $szPerm
     *
     * @return User
     */
    public function setSzPerm($szPerm)
    {
        $this->szPerm = $szPerm;

        return $this;
    }

    /**
     * Get szPerm
     *
     * @return string
     */
    public function getSzPerm()
    {
        return $this->szPerm;
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
}
