<?php
namespace Slava\Bundle\IssueBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

// Oro\Component\TestUtils\ORM\OrmTestCase
class IssueRepoTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testFindIssueEntity()
    {
        $issues = $this->em->getRepository('IssueBundle:Issue')->findall();
        $this->assertCount(0, $issues);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        // $this->em->close();
    }
}
