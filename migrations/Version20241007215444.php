<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241007215444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participants DROP CONSTRAINT fk_71697092634dfeb');
        $this->addSql('ALTER TABLE participants DROP CONSTRAINT fk_716970925596d5f7');
        $this->addSql('DROP TABLE dogs');
        $this->addSql('DROP TABLE participants');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE dogs (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, breed VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE participants (id VARCHAR(255) NOT NULL, dog_id VARCHAR(255) NOT NULL, trial_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, registrationdate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_716970925596d5f7 ON participants (trial_id)');
        $this->addSql('CREATE INDEX idx_71697092634dfeb ON participants (dog_id)');
        $this->addSql('ALTER TABLE participants ADD CONSTRAINT fk_71697092634dfeb FOREIGN KEY (dog_id) REFERENCES dogs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE participants ADD CONSTRAINT fk_716970925596d5f7 FOREIGN KEY (trial_id) REFERENCES trials (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
