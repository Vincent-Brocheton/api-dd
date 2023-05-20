<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520095709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prerequis VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don_personnage (don_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_CE0CC0717B3C9061 (don_id), INDEX IDX_CE0CC0715E315342 (personnage_id), PRIMARY KEY(don_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don_effet (id INT AUTO_INCREMENT NOT NULL, don_id INT DEFAULT NULL, effet LONGTEXT NOT NULL, INDEX IDX_843B363C7B3C9061 (don_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE don_personnage ADD CONSTRAINT FK_CE0CC0717B3C9061 FOREIGN KEY (don_id) REFERENCES don (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE don_personnage ADD CONSTRAINT FK_CE0CC0715E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE don_effet ADD CONSTRAINT FK_843B363C7B3C9061 FOREIGN KEY (don_id) REFERENCES don (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE don_personnage DROP FOREIGN KEY FK_CE0CC0717B3C9061');
        $this->addSql('ALTER TABLE don_personnage DROP FOREIGN KEY FK_CE0CC0715E315342');
        $this->addSql('ALTER TABLE don_effet DROP FOREIGN KEY FK_843B363C7B3C9061');
        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE don_personnage');
        $this->addSql('DROP TABLE don_effet');
    }
}
