<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221229234429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE interest_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE membership_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE interest_group (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE membership (id INT NOT NULL, interest_group_id INT NOT NULL, member_id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, level VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_86FFD28582874C87 ON membership (interest_group_id)');
        $this->addSql('CREATE INDEX IDX_86FFD2857597D3FE ON membership (member_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD28582874C87 FOREIGN KEY (interest_group_id) REFERENCES interest_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD2857597D3FE FOREIGN KEY (member_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE interest_group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE membership_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE membership DROP CONSTRAINT FK_86FFD28582874C87');
        $this->addSql('ALTER TABLE membership DROP CONSTRAINT FK_86FFD2857597D3FE');
        $this->addSql('DROP TABLE interest_group');
        $this->addSql('DROP TABLE membership');
        $this->addSql('DROP TABLE "user"');
    }
}
