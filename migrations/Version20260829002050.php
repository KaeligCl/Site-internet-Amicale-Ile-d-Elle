<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260829002050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, pic_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_B26681E9E51FD91 (pic_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE photo_event (id INT AUTO_INCREMENT NOT NULL, pic1 VARCHAR(255) DEFAULT NULL, pic2 VARCHAR(255) DEFAULT NULL, pic3 VARCHAR(255) DEFAULT NULL, pic4 VARCHAR(255) DEFAULT NULL, pic5 VARCHAR(255) DEFAULT NULL, pic6 VARCHAR(255) DEFAULT NULL, pic7 VARCHAR(255) DEFAULT NULL, pic8 VARCHAR(255) DEFAULT NULL, pic9 VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E9E51FD91 FOREIGN KEY (pic_id) REFERENCES photo_event (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E9E51FD91');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE photo_event');
    }
}
