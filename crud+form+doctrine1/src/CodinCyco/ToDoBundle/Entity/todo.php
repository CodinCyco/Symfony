<?php

namespace CodinCyco\ToDoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * todo
 *
 * @ORM\Table(name="todo")
 * @ORM\Entity(repositoryClass="CodinCyco\ToDoBundle\Repository\todoRepository")
 */
class todo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="due_date", type="date")
     */
    private $dueDate;

    /**
     * @var \string
     *
     * @ORM\Column(name="category", type="string" , length=255)
     */
    private $category;

    /**
     * @var \string
     *
     * @ORM\Column(name="description", type="string" , length=255)
     */
    private $description;

    /**
     * @var \string
     *
     * @ORM\Column(name="priority", type="string" , length=255)
     */
    private $priority;

    /**
     * @var \string
     *
     * @ORM\Column(name="create_date", type="date")
     */
    private $createDate;

    /**
     * @ORM\ManyToOne(targetEntity="globe")
     * @ORM\JoinColumn(name="globe_id", referencedColumnName="id")
     */
    private $globe;



    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return string
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param string $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }



    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return todo
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
     * Set dueDate
     *
     * @param \DateTime $dueDate
     *
     * @return todo
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set globe
     *
     * @param \CodinCyco\ToDoBundle\Entity\globe $globe
     *
     * @return todo
     */
    public function setGlobe(\CodinCyco\ToDoBundle\Entity\globe $globe = null)
    {
        $this->globe = $globe;

        return $this;
    }

    /**
     * Get globe
     *
     * @return \CodinCyco\ToDoBundle\Entity\globe
     */
    public function getGlobe()
    {
        return $this->globe;
    }
}
