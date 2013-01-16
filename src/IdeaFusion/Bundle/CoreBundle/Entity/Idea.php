<?php

namespace IdeaFusion\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * IdeaFusion\Bundle\CoreBundle\Entity\Idea
 *
 * @ORM\Entity(repositoryClass="IdeaFusion\Bundle\CoreBundle\Entity\Repository\IdeaRepository")
 * @ORM\Table(name="ideas")
 */
class Idea
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_idea;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $title;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date_create;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date_update;

    /**
     * @ORM\OneToMany(targetEntity="Solution", mappedBy="idea")
     */
    protected $solutions;

    /**
     * @ORM\ManyToOne(targetEntity="IdeaFusion\Bundle\UsersBundle\Entity\User", inversedBy="ideas")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     */
    protected $user;

	public function __construct()
    {
    	$this->date_create = new \DateTime();
		$this->solutions = new ArrayCollection();
    }

    /**
     * Set the value of id_idea.
     *
     * @param integer $id_idea
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Idea
     */
    public function setIdIdea($id_idea)
    {
        $this->id_idea = $id_idea;

        return $this;
    }

    /**
     * Get the value of id_idea.
     *
     * @return integer
     */
    public function getIdIdea()
    {
        return $this->id_idea;
    }

    /**
     * Set the value of title.
     *
     * @param string $title
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Idea
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Idea
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of date_create.
     *
     * @param integer $date_create
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Idea
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
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Idea
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

    /**
     * Set the value of user.
     *
     * @param integer $user
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Idea
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of user.
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }

	/**
     * Add Solution entity to collection (one to many).
     *
     * @param \IdeaFusion\Bundle\CoreBundle\Entity\Solution $solution
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Idea
     */
    public function addSolution(Solution $solution)
    {
        $this->solutions[] = $solution;

        return $this;
    }


    /**
     * Get the value of solutions.
     *
     * @return integer
     */
    public function getSolutions()
    {
        return $this->solutions;
    }
}