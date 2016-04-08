<?php

namespace Slava\Bundle\IssueBundle\Entity;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Slava\Bundle\IssueBundle\Model\ExtendIssue;
 /**
  * ...
  *
  * @Config(
  *  defaultValues={
  *      "workflow"={
  *          "active_workflow"="issue_status_workflow"
  *      },
  *         "security"={
  *             "type"="ACL",
  *             "permissions"="All"
  *          }
  *  }
  * )
  */
 
class Issue// extends ExtendIssue
{
  use WorkflowTrait;
  use UpdateTrait;
  
  /**
  * Set parent
  *
  * @param \Slava\Bundle\IssueBundle\Entity\Issue $parent
  *
  * @return Issue
  */
  public function setParent(\Slava\Bundle\IssueBundle\Entity\Issue $parent)
  {
    $this->parent[0] = $parent;
    
    return $this;
  }
  /**
  * Get parent
  *
  * @return \Slava\Bundle\IssueBundle\Entity\Issue $parent
  */
  public function getParent()
  {
    return $this->parent[0];
  }
  
  /*********************************************************************************************?
  
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var string
     */
    private $oneToOne;

    /**
     * @var string
     */
    private $manyToMany;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Issue
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Issue
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Issue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Issue
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Issue
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Issue
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set oneToOne
     *
     * @param string $oneToOne
     *
     * @return Issue
     */
    public function setOneToOne($oneToOne)
    {
        $this->oneToOne = $oneToOne;

        return $this;
    }

    /**
     * Get oneToOne
     *
     * @return string
     */
    public function getOneToOne()
    {
        return $this->oneToOne;
    }

    /**
     * Set manyToMany
     *
     * @param string $manyToMany
     *
     * @return Issue
     */
    public function setManyToMany($manyToMany)
    {
        $this->manyToMany = $manyToMany;

        return $this;
    }

    /**
     * Get manyToMany
     *
     * @return string
     */
    public function getManyToMany()
    {
        return $this->manyToMany;
    }
    /**
     * @var \Oro\Bundle\UserBundle\Entity\User
     */
    private $reporter;

    /**
     * @var \Oro\Bundle\UserBundle\Entity\User
     */
    private $assignee;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $collaborators;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->collaborators = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set reporter
     *
     * @param \Oro\Bundle\UserBundle\Entity\User $reporter
     *
     * @return Issue
     */
    public function setReporter(\Oro\Bundle\UserBundle\Entity\User $reporter = null)
    {
        $this->reporter = $reporter;

        return $this;
    }

    /**
     * Get reporter
     *
     * @return \Oro\Bundle\UserBundle\Entity\User
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * Set assignee
     *
     * @param \Oro\Bundle\UserBundle\Entity\User $assignee
     *
     * @return Issue
     */
    public function setAssignee(\Oro\Bundle\UserBundle\Entity\User $assignee = null)
    {
        $this->assignee = $assignee;

        return $this;
    }

    /**
     * Get assignee
     *
     * @return \Oro\Bundle\UserBundle\Entity\User
     */
    public function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * Add child
     *
     * @param \Slava\Bundle\IssueBundle\Entity\Issue $child
     *
     * @return Issue
     */
    public function addChild(\Slava\Bundle\IssueBundle\Entity\Issue $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Slava\Bundle\IssueBundle\Entity\Issue $child
     */
    public function removeChild(\Slava\Bundle\IssueBundle\Entity\Issue $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }




    /**
     * Add collaborator
     *
     * @param \Oro\Bundle\UserBundle\Entity\User $collaborator
     *
     * @return Issue
     */
    public function addCollaborator(\Oro\Bundle\UserBundle\Entity\User $collaborator)
    {
        $this->collaborators[] = $collaborator;

        return $this;
    }

    /**
     * Remove collaborator
     *
     * @param \Oro\Bundle\UserBundle\Entity\User $collaborator
     */
    public function removeCollaborator(\Oro\Bundle\UserBundle\Entity\User $collaborator)
    {
        $this->collaborators->removeElement($collaborator);
    }

    /**
     * Get collaborators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollaborators()
    {
        return $this->collaborators;
    }

    /**
     * Add parent
     *
     * @param \Slava\Bundle\IssueBundle\Entity\Issue $parent
     *
     * @return Issue
     */
    public function addParent(\Slava\Bundle\IssueBundle\Entity\Issue $parent)
    {
        $this->parent[] = $parent;

        return $this;
    }

    /**
     * Remove parent
     *
     * @param \Slava\Bundle\IssueBundle\Entity\Issue $parent
     */
    public function removeParent(\Slava\Bundle\IssueBundle\Entity\Issue $parent)
    {
        $this->parent->removeElement($parent);
    }
    /**
     * @var \Oro\Bundle\WorkflowBundle\Entity\WorkflowItem
     */
    private $workflow_item;

    /**
     * @var \Oro\Bundle\WorkflowBundle\Entity\WorkflowStep
     */
    private $workflow_step;


}
