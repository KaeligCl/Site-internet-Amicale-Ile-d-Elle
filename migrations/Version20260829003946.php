<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260829003946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements ADD pic_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD4009E51FD91 FOREIGN KEY (pic_id) REFERENCES photo_event (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E10AD4009E51FD91 ON evenements (pic_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY FK_E10AD4009E51FD91');
        $this->addSql('DROP INDEX UNIQ_E10AD4009E51FD91 ON evenements');
        $this->addSql('ALTER TABLE evenements DROP pic_id');
    }
}
