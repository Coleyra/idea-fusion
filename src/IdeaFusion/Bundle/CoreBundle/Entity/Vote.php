<?php

namespace IdeaFusion\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * IdeaFusion\Bundle\CoreBundle\Entity\Vote
 *
 * @ORM\Entity(repositoryClass="IdeaFusion\Bundle\CoreBundle\Entity\Repository\VoteRepository")
 * @ORM\Table(name="votes")
 */
class Vote
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Solution", inversedBy="votes")
     * @ORM\JoinColumn(name="id_solution", referencedColumnName="id_solution")
     */
    protected $solution;

	/**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IdeaFusion\Bundle\UsersBundle\Entity\User", inversedBy="votes")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     */
    protected $user;

    /**
     * @ORM\Column(type="integer")
     */
    protected $point;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date_create;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date_update;
    
	public function __construct()
    {
    	$this->date_create = new \DateTime();
    }

    /**
     * Set the value of user.
     *
     * @param $user
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Vote
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of user.
     *
     * @return 
     */
    public function getUser()
    {
        return $this->user;
    }

	/**
     * Set the value of solution.
     *
     * @param $solution
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Vote
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;

        return $this;
    }

    /**
     * Get the value of solution.
     *
     * @return 
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * Set the value of point.
     *
     * @param integer $point
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Vote
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get the value of point.
     *
     * @return integer
     */
    public function getPoint()
    {
        return $this->point;
    }

	/**
     * Set the value of date_create.
     *
     * @param integer $date_create
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Vote
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;

        return $this;
    }

    /**
     * Get the value of date_create.
     *
     * @return integer
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * Set the value of date_update.
     *
     * @param integer $date_update
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Vote
     */
    public function setDateUpdate($date_update)
    {
        $this->date_update = $date_update;

        return $this;
    }

    /**
     * Get the value of date_update.
     *
     * @return integer
     */
    public function getDateUpdate()
    {
        return $this->date_update;
    }
}