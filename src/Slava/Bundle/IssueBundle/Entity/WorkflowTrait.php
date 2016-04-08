<?php
namespace Slava\Bundle\IssueBundle\Entity;
use Oro\Bundle\WorkflowBundle\Entity\WorkflowItem;
use Oro\Bundle\WorkflowBundle\Entity\WorkflowStep;

trait WorkflowTrait {
  /**
   * @param WorkflowItem $workflowItem
   * @return Opportunity
   */
  public function setWorkflowItem($workflowItem)
  {
      $this->workflowItem = $workflowItem;

      return $this;
  }

  /**
   * @return WorkflowItem
   */
  public function getWorkflowItem()
  {
      return $this->workflowItem;
  }

  /**
   * @param WorkflowItem $workflowStep
   * @return Opportunity
   */
  public function setWorkflowStep($workflowStep)
  {
      $this->workflowStep = $workflowStep;

      return $this;
  }

  /**
   * @return WorkflowStep
   */
  public function getWorkflowStep()
  {
      return $this->workflowStep;
  }
}
