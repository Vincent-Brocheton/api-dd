<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230518192048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ecole (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sort (id INT AUTO_INCREMENT NOT NULL, ecole_id INT NOT NULL, niveau INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, jet TINYINT(1) NOT NULL, sauvegarde TINYINT(1) NOT NULL, sauvegarde_level INT DEFAULT NULL, INDEX IDX_5124F22277EF1B1E (ecole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sort ADD CONSTRAINT FK_5124F22277EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecole (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sort DROP FOREIGN KEY FK_5124F22277EF1B1E');
        $this->addSql('DROP TABLE ecole');
        $this->addSql('DROP TABLE sort');
    }
}
