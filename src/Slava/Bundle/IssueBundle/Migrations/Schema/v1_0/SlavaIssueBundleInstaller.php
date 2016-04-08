<?php

namespace Slava\Bundle\IssueBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassLength)
 */
class SlavaIssueBundleInstaller implements Installation
{
    /**
     * {@inheritdoc}
     */
    public function getMigrationVersion()
    {
        return 'v1_0';
    }

    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        /** Tables generation **/
        $this->createSlavaIssueTable($schema);
        $this->createSlavaIssueChildrenToIssueParentTable($schema);
        $this->createSlavaIssueCollaboratorsToOroUserTable($schema);

        /** Foreign keys generation **/
        $this->addSlavaIssueForeignKeys($schema);
        $this->addSlavaIssueChildrenToIssueParentForeignKeys($schema);
        $this->addSlavaIssueCollaboratorsToOroUserForeignKeys($schema);
    }

    /**
     * Create slava_issue table
     *
     * @param Schema $schema
     */
    protected function createSlavaIssueTable(Schema $schema)
    {
        $table = $schema->createTable('slava_issue');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('assignee_id', 'integer', ['notnull' => false]);
        $table->addColumn('reporter_id', 'integer', ['notnull' => false]);
        $table->addColumn('summary', 'string', ['length' => 255]);
        $table->addColumn('code', 'string', ['length' => 255]);
        $table->addColumn('description', 'text', []);
        $table->addColumn('type', 'string', ['length' => 255]);
        $table->addColumn('created', 'datetime', []);
        $table->addColumn('updated', 'datetime', []);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['reporter_id'], 'UNIQ_E22D4540E1CFE6F5');
        $table->addUniqueIndex(['assignee_id'], 'UNIQ_E22D454059EC7D60');
    }

    /**
     * Create slava_issue_children_to_issue_parent table
     *
     * @param Schema $schema
     */
    protected function createSlavaIssueChildrenToIssueParentTable(Schema $schema)
    {
        $table = $schema->createTable('slava_issue_children_to_issue_parent');
        $table->addColumn('children_id', 'integer', []);
        $table->addColumn('parent_id', 'integer', []);
        $table->setPrimaryKey(['children_id', 'parent_id']);
        $table->addIndex(['children_id'], 'IDX_CE9148693D3D2749', []);
        $table->addIndex(['parent_id'], 'IDX_CE914869727ACA70', []);
    }

    /**
     * Create slava_issue_collaborators_to_oro_user table
     *
     * @param Schema $schema
     */
    protected function createSlavaIssueCollaboratorsToOroUserTable(Schema $schema)
    {
        $table = $schema->createTable('slava_issue_collaborators_to_oro_user');
        $table->addColumn('collaborator_id', 'integer', []);
        $table->addColumn('issue_id', 'integer', []);
        $table->setPrimaryKey(['collaborator_id', 'issue_id']);
        $table->addUniqueIndex(['issue_id'], 'UNIQ_E58016BB5E7AA58C');
        $table->addIndex(['collaborator_id'], 'IDX_E58016BB30098C8C', []);
    }

    /**
     * Add slava_issue foreign keys.
     *
     * @param Schema $schema
     */
    protected function addSlavaIssueForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('slava_issue');
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_user'),
            ['assignee_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_user'),
            ['reporter_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
    }

    /**
     * Add slava_issue_children_to_issue_parent foreign keys.
     *
     * @param Schema $schema
     */
    protected function addSlavaIssueChildrenToIssueParentForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('slava_issue_children_to_issue_parent');
        $table->addForeignKeyConstraint(
            $schema->getTable('slava_issue'),
            ['children_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
        $table->addForeignKeyConstraint(
            $schema->getTable('slava_issue'),
            ['parent_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
    }

    /**
     * Add slava_issue_collaborators_to_oro_user foreign keys.
     *
     * @param Schema $schema
     */
    protected function addSlavaIssueCollaboratorsToOroUserForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('slava_issue_collaborators_to_oro_user');
        $table->addForeignKeyConstraint(
            $schema->getTable('slava_issue'),
            ['collaborator_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_user'),
            ['issue_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
    }
}
