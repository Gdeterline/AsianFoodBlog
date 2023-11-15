<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115015959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__kitchen AS SELECT id, meal_name FROM kitchen');
        $this->addSql('DROP TABLE kitchen');
        $this->addSql('CREATE TABLE kitchen (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO kitchen (id, name) SELECT id, meal_name FROM __temp__kitchen');
        $this->addSql('DROP TABLE __temp__kitchen');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__kitchen AS SELECT id, name FROM kitchen');
        $this->addSql('DROP TABLE kitchen');
        $this->addSql('CREATE TABLE kitchen (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, meal_name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO kitchen (id, meal_name) SELECT id, name FROM __temp__kitchen');
        $this->addSql('DROP TABLE __temp__kitchen');
    }
}
