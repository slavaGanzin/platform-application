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
            
        $loader = new \Doctrine\Common\DataFixtures\Loader;
        $loader->loadFromFile('./src/Slava/Bundle/IssueBundle/Migrations/Data/ORM/LoadIssues.php');
        $purger = new \Doctrine\Common\DataFixtures\Purger\ORMPurger($this->em);
        $executor = new \Doctrine\Common\DataFixtures\Executor\ORMExecutor($this->em, $purger);
        $executor->execute($loader->getFixtures());
    }

    public function testFirstEntity()
    {
        $issues = $this->em->getRepository('SlavaIssueBundle:Issue')->findall();
        $this->assertCount(1, $issues);
        $this->assertEquals('description', $issues[0]->getDescription());
        $this->assertEquals('summary', $issues[0]->getSummary());
        $this->assertEquals('Bug', $issues[0]->getType());
        $this->assertEquals('S-1', $issues[0]->getCode());
        $this->assertEquals(null, $issues[0]->getParent());
        $this->assertEquals(null, $issues[0]->getAssignee());
        $this->assertEquals(null, $issues[0]->getReporter());
        $this->assertInstanceOf('\Doctrine\ORM\PersistentCollection', $issues[0]->getCollaborators());
        $this->assertInstanceOf('\Doctrine\ORM\PersistentCollection', $issues[0]->getChildren());
        $this->assertInstanceOf('\DateTime', $issues[0]->getCreated());
        $this->assertInstanceOf('\DateTime', $issues[0]->getUpdated());
        
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}
