<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230205131936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__contact AS SELECT id, last_name, first_name, phone_number, email, notes FROM contact');
        $this->addSql('DROP TABLE contact');
        $this->addSql('CREATE TABLE contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, notes VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO contact (id, last_name, first_name, phone_number, email, notes) SELECT id, last_name, first_name, phone_number, email, notes FROM __temp__contact');
        $this->addSql('DROP TABLE __temp__contact');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__contact AS SELECT id, last_name, first_name, phone_number, email, notes FROM contact');
        $this->addSql('DROP TABLE contact');
        $this->addSql('CREATE TABLE contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, notes VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO contact (id, last_name, first_name, phone_number, email, notes) SELECT id, last_name, first_name, phone_number, email, notes FROM __temp__contact');
        $this->addSql('DROP TABLE __temp__contact');
    }
}
