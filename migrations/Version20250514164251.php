<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250514164251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__audio AS SELECT id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug FROM audio
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE audio
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE audio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, audio_url VARCHAR(255) NOT NULL, cover VARCHAR(255) DEFAULT NULL, duration INTEGER NOT NULL, published_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            , created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            , slug VARCHAR(255) NOT NULL, CONSTRAINT FK_187D3695F675F31B FOREIGN KEY (author_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_187D369512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO audio (id, author_id, category_id, title, description, audio_url, cover, duration, published_at, created_at, updated_at, slug) SELECT id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug FROM __temp__audio
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__audio
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_187D3695F675F31B ON audio (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_187D369512469DE2 ON audio (category_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__audio AS SELECT id, author_id, category_id, title, description, audio_url, cover, duration, published_at, created_at, updated_at, slug FROM audio
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE audio
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE audio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, file VARCHAR(255) NOT NULL, cover VARCHAR(255) DEFAULT NULL, duration INTEGER NOT NULL, published_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            , created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            , slug VARCHAR(255) NOT NULL, CONSTRAINT FK_187D3695F675F31B FOREIGN KEY (author_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_187D369512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO audio (id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug) SELECT id, author_id, category_id, title, description, audio_url, cover, duration, published_at, created_at, updated_at, slug FROM __temp__audio
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__audio
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_187D3695F675F31B ON audio (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_187D369512469DE2 ON audio (category_id)
        SQL);
    }
}
