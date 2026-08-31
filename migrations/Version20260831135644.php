<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260831135644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location_request (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, telephone VARCHAR(30) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, message LONGTEXT DEFAULT NULL, statut VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL, equipement_id INT NOT NULL, INDEX IDX_D5D29C3B806F0F5C (equipement_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE location_request ADD CONSTRAINT FK_D5D29C3B806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location_request DROP FOREIGN KEY FK_D5D29C3B806F0F5C');
        $this->addSql('DROP TABLE location_request');
    }
}
