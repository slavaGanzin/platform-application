<?php
namespace Slava\Bundle\IssueBundle\Entity;

trait UpdateTrait {
  /**
  * @return Issue;
  */
  public function updateTimestamps()
  {
    $this->setUpdated(new \DateTime('now'));
    if ($this->getCreated() == null) {
      $this->setCreated(new \DateTime('now'));
    }
    return $this;
  }
}
