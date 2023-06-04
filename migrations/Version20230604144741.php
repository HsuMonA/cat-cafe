<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230604144741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
            INSERT INTO service (id,`type`,price) VALUES
                (1,'Simple booking without beverage and snacks',15.0),
                (2,'One beverage and one snack/cake per person',28.0),
                (3,'Yoga with cats',35.0);
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<SQL
            DELETE FROM service WHERE id = 1 OR id = 2 OR id = 3;
            ALTER TABLE service AUTO_INCREMENT = 1;
        SQL);
    }
}