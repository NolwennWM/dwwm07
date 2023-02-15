<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220927100804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, chef_lieu_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, code INT NOT NULL, UNIQUE INDEX UNIQ_C1765B63AD611528 (chef_lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63AD611528 FOREIGN KEY (chef_lieu_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE ville ADD departement_id INT NOT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C3CCF9E01E ON ville (departement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3CCF9E01E');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63AD611528');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP INDEX IDX_43C3D9C3CCF9E01E ON ville');
        $this->addSql('ALTER TABLE ville DROP departement_id');
    }
}
