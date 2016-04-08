<?php
namespace Slava\Bundle\IssueBundle\Migrations\Data\Orm;
use Slava\Bundle\IssueBundle\Entity\Issue;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadIssues implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = [
          [
            'summary' => 'summary',
            'code' => 'S-1',
            'description' => 'description',
            'type' => 'Bug',
          ]
        ];
        foreach ($data as $row) {
          $entity = new Issue();
          foreach ($row as $field => $value) {
            call_user_func([$entity, 'set'.ucfirst($field)], $value);
          }
          $manager->persist($entity);
        }
        $manager->flush();
    }
}
