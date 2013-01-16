<?php

namespace IdeaFusion\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * IdeaFusion\Bundle\CoreBundle\Entity\Solution
 *
 * @ORM\Entity(repositoryClass="IdeaFusion\Bundle\CoreBundle\Entity\Repository\SolutionRepository")
 * @ORM\Table(name="solutions")
 */
class Solution
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_solution;

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
     * @ORM\ManyToOne(targetEntity="Idea", inversedBy="solutions")
     * @ORM\JoinColumn(name="id_idea", referencedColumnName="id_idea")
     */
    protected $idea;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="solution")
     */
    protected $votes;

	public function __construct()
    {
    	$this->date_create = new \DateTime();
		$this->votes = new ArrayCollection();
    }

    /**
     * Set the value of id_solution.
     *
     * @param integer $id_solution
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Solution
     */
    public function setIdSolution($id_solution)
    {
        $this->id_solution = $id_solution;

        return $this;
    }

    /**
     * Get the value of id_solution.
     *
     * @return integer
     */
    public function getIdSolution()
    {
        return $this->id_solution;
    }

    /**
     * Set the value of title.
     *
     * @param string $title
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Solution
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
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Solution
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
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Solution
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
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Solution
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
     * Set the value of idea.
     *
     * @param integer $idea
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Solution
     */
    public function setIdea($idea)
    {
        $this->idea = $idea;

        return $this;
    }

    /**
     * Get the value of idea.
     *
     * @return integer
     */
    public function getIdea()
    {
        return $this->idea;
    }

    /**
     * Add Vote entity to collection (one to many).
     *
     * @param \IdeaFusion\Bundle\CoreBundle\Entity\Vote $vote
     * @return \IdeaFusion\Bundle\CoreBundle\Entity\Solution
     */
    public function addVote(Vote $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

	/**
     * Get the value of votes.
     *
     * @return integer
     */
    public function getVotes()
    {
        return $this->votes;
    }
}