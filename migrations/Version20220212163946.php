<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220212163946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bien_immobilier (num_immo INT NOT NULL, yes_id INT DEFAULT NULL, statut VARCHAR(100) NOT NULL, prix VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, INDEX IDX_D1BE34E12CB716C7 (yes_id), PRIMARY KEY(num_immo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (num_prop INT NOT NULL, nom VARCHAR(100) NOT NULL, numtel INT NOT NULL, PRIMARY KEY(num_prop)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(100) NOT NULL, categorie VARCHAR(100) NOT NULL, gamme VARCHAR(100) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien_immobilier ADD CONSTRAINT FK_D1BE34E12CB716C7 FOREIGN KEY (yes_id) REFERENCES proprietaire (numProp)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien_immobilier DROP FOREIGN KEY FK_D1BE34E12CB716C7');
        $this->addSql('DROP TABLE bien_immobilier');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE voiture');
    }
}
