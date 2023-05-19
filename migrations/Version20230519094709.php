<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230519094709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, stat VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_personnage (id INT AUTO_INCREMENT NOT NULL, personnage_id INT NOT NULL, competence_id INT DEFAULT NULL, is_maitrise TINYINT(1) NOT NULL, INDEX IDX_446AF09A5E315342 (personnage_id), INDEX IDX_446AF09A15761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecole (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manifestation_occulte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, degats VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objet_personnage (objet_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_B9F4DA17F520CF5A (objet_id), INDEX IDX_B9F4DA175E315342 (personnage_id), PRIMARY KEY(objet_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, niveau INT NOT NULL, force_stat INT DEFAULT NULL, force_mod INT DEFAULT NULL, dexterite_stat INT DEFAULT NULL, dexterite_mod INT DEFAULT NULL, constitution_stat INT DEFAULT NULL, constitution_mod INT DEFAULT NULL, intelligence_stat INT DEFAULT NULL, intelligence_mod INT DEFAULT NULL, sagesse_stat INT DEFAULT NULL, sagesse_mod INT DEFAULT NULL, charisme_stat INT DEFAULT NULL, charisme_mod INT DEFAULT NULL, ca INT DEFAULT NULL, pv INT DEFAULT NULL, pv_actuel INT DEFAULT NULL, pv_temp INT DEFAULT NULL, des_vie VARCHAR(6) DEFAULT NULL, jds_succes INT DEFAULT NULL, jds_echecs INT DEFAULT NULL, vitesse VARCHAR(4) DEFAULT NULL, maitrise INT DEFAULT NULL, alignement VARCHAR(2) DEFAULT NULL, xp INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_classe (id INT AUTO_INCREMENT NOT NULL, personnage_id INT NOT NULL, classe_id INT NOT NULL, niveau INT NOT NULL, principale TINYINT(1) NOT NULL, INDEX IDX_492135285E315342 (personnage_id), INDEX IDX_492135288F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_sort (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, sort_id INT DEFAULT NULL, is_prepared TINYINT(1) NOT NULL, INDEX IDX_864974C5E315342 (personnage_id), INDEX IDX_864974C47013001 (sort_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race_trait (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, mod_carac TINYINT(1) NOT NULL, modificateur VARCHAR(4) DEFAULT NULL, carac VARCHAR(3) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race_trait_race (race_trait_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_721696334C02A2C2 (race_trait_id), INDEX IDX_721696336E59D40D (race_id), PRIMARY KEY(race_trait_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sort (id INT AUTO_INCREMENT NOT NULL, ecole_id INT NOT NULL, niveau INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, jet TINYINT(1) NOT NULL, sauvegarde TINYINT(1) NOT NULL, sauvegarde_level INT DEFAULT NULL, type_jet VARCHAR(20) DEFAULT NULL, INDEX IDX_5124F22277EF1B1E (ecole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence_personnage ADD CONSTRAINT FK_446AF09A5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE competence_personnage ADD CONSTRAINT FK_446AF09A15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE objet_personnage ADD CONSTRAINT FK_B9F4DA17F520CF5A FOREIGN KEY (objet_id) REFERENCES objet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE objet_personnage ADD CONSTRAINT FK_B9F4DA175E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_classe ADD CONSTRAINT FK_492135285E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_classe ADD CONSTRAINT FK_492135288F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE personnage_sort ADD CONSTRAINT FK_864974C5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_sort ADD CONSTRAINT FK_864974C47013001 FOREIGN KEY (sort_id) REFERENCES sort (id)');
        $this->addSql('ALTER TABLE race_trait_race ADD CONSTRAINT FK_721696334C02A2C2 FOREIGN KEY (race_trait_id) REFERENCES race_trait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE race_trait_race ADD CONSTRAINT FK_721696336E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sort ADD CONSTRAINT FK_5124F22277EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecole (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence_personnage DROP FOREIGN KEY FK_446AF09A5E315342');
        $this->addSql('ALTER TABLE competence_personnage DROP FOREIGN KEY FK_446AF09A15761DAB');
        $this->addSql('ALTER TABLE objet_personnage DROP FOREIGN KEY FK_B9F4DA17F520CF5A');
        $this->addSql('ALTER TABLE objet_personnage DROP FOREIGN KEY FK_B9F4DA175E315342');
        $this->addSql('ALTER TABLE personnage_classe DROP FOREIGN KEY FK_492135285E315342');
        $this->addSql('ALTER TABLE personnage_classe DROP FOREIGN KEY FK_492135288F5EA509');
        $this->addSql('ALTER TABLE personnage_sort DROP FOREIGN KEY FK_864974C5E315342');
        $this->addSql('ALTER TABLE personnage_sort DROP FOREIGN KEY FK_864974C47013001');
        $this->addSql('ALTER TABLE race_trait_race DROP FOREIGN KEY FK_721696334C02A2C2');
        $this->addSql('ALTER TABLE race_trait_race DROP FOREIGN KEY FK_721696336E59D40D');
        $this->addSql('ALTER TABLE sort DROP FOREIGN KEY FK_5124F22277EF1B1E');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE competence_personnage');
        $this->addSql('DROP TABLE ecole');
        $this->addSql('DROP TABLE manifestation_occulte');
        $this->addSql('DROP TABLE objet');
        $this->addSql('DROP TABLE objet_personnage');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE personnage_classe');
        $this->addSql('DROP TABLE personnage_sort');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE race_trait');
        $this->addSql('DROP TABLE race_trait_race');
        $this->addSql('DROP TABLE sort');
        $this->addSql('DROP TABLE user');
    }
}
