<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250627111558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Vérifie si la table advertise existe avant d'ajouter la colonne
        if ($schema->hasTable('advertise')) {
            // Modification ici : ajout de DEFAULT 0 pour initialiser à false
            $this->addSql('ALTER TABLE advertise ADD is_middle TINYINT(1) DEFAULT 0 NOT NULL');
        }

        // Ces modifications ne dépendent pas de la table advertise
        $this->addSql('ALTER TABLE category CHANGE description description VARCHAR(255) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // Vérifie si la table advertise existe avant de supprimer la colonne
        if ($schema->hasTable('advertise')) {
            $this->addSql('ALTER TABLE advertise DROP is_middle');
        }

        // Rollback des autres modifications
        $this->addSql('ALTER TABLE category CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}