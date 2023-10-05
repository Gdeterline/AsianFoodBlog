<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231005163200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER DEFAULT NULL, relation VARCHAR(255) NOT NULL, CONSTRAINT FK_70E4FA7812469DE2 FOREIGN KEY (category_id) REFERENCES kitchen (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70E4FA7812469DE2 ON member (category_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__meal AS SELECT id, name, description FROM meal');
        $this->addSql('DROP TABLE meal');
        $this->addSql('CREATE TABLE meal (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, kitchen_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_9EF68E9C5F858004 FOREIGN KEY (kitchen_id) REFERENCES kitchen (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO meal (id, name, description) SELECT id, name, description FROM __temp__meal');
        $this->addSql('DROP TABLE __temp__meal');
        $this->addSql('CREATE INDEX IDX_9EF68E9C5F858004 ON meal (kitchen_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE member');
        $this->addSql('CREATE TEMPORARY TABLE __temp__meal AS SELECT id, name, description FROM meal');
        $this->addSql('DROP TABLE meal');
        $this->addSql('CREATE TABLE meal (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO meal (id, name, description) SELECT id, name, description FROM __temp__meal');
        $this->addSql('DROP TABLE __temp__meal');
    }
}
