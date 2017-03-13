<?php

namespace Mindy\Bundle\ReviewBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Mindy\Bundle\ReviewBundle\Model\Review;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170313110249 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        foreach (Review::objects()->batch(100) as $reviews) {
            foreach ($reviews as $review) {
                /** @var Review $review */
                $review->created_at = $review->timestamp;
                $review->save(['created_at']);
            }
        }

        $reviewTable = $schema->getTable(Review::tableName());
        $reviewTable->dropColumn('timestamp');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        throw new \LogicException('Impossible');
    }
}
