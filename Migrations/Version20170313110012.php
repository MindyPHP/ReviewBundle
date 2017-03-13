<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Mindy\Bundle\ReviewBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Mindy\Bundle\ReviewBundle\Model\Review;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170313110012 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $reviewTable = $schema->getTable(Review::tableName());
        $reviewTable->addColumn('email', 'string', ['length' => 255]);
        $reviewTable->addColumn('timestamp', 'string', ['length' => 255]);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $reviewTable = $schema->getTable(Review::tableName());
        $reviewTable->dropColumn('email');
        $reviewTable->dropColumn('timestamp');
    }
}
