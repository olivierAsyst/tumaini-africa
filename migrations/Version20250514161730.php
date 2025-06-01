<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250514161730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__article AS SELECT id, author_id, category_id, title, content, image, published_at, created_at, updated_at, slug, excerpt FROM article
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE article
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, content CLOB DEFAULT NULL, image_url VARCHAR(255) DEFAULT NULL, published_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            , created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            , slug VARCHAR(255) NOT NULL, excerpt CLOB DEFAULT NULL, CONSTRAINT FK_23A0E66F675F31B FOREIGN KEY (author_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO article (id, author_id, category_id, title, content, image_url, published_at, created_at, updated_at, slug, excerpt) SELECT id, author_id, category_id, title, content, image, published_at, created_at, updated_at, slug, excerpt FROM __temp__article
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__article
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_23A0E66F675F31B ON article (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__audio AS SELECT id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug FROM audio
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE audio
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE audio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, file VARCHAR(255) NOT NULL, cover VARCHAR(255) DEFAULT NULL, duration INTEGER NOT NULL, published_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            , created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            , slug VARCHAR(255) NOT NULL, CONSTRAINT FK_187D3695F675F31B FOREIGN KEY (author_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_187D369512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO audio (id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug) SELECT id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug FROM __temp__audio
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__audio
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_187D369512469DE2 ON audio (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_187D3695F675F31B ON audio (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__category AS SELECT id, name, description, slug, created_at, updated_at FROM category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            )
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO category (id, name, description, slug, created_at, updated_at) SELECT id, name, description, slug, created_at, updated_at FROM __temp__category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__category
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__comments AS SELECT id, author_id, article_id, audio_id, content, created_at, updated_at, likes, dislikes FROM comments
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE comments
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE comments (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, article_id INTEGER DEFAULT NULL, audio_id INTEGER DEFAULT NULL, content VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , likes INTEGER NOT NULL, dislikes INTEGER NOT NULL, CONSTRAINT FK_5F9E962AF675F31B FOREIGN KEY (author_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5F9E962A7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5F9E962A3A3123C7 FOREIGN KEY (audio_id) REFERENCES audio (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO comments (id, author_id, article_id, audio_id, content, created_at, updated_at, likes, dislikes) SELECT id, author_id, article_id, audio_id, content, created_at, updated_at, likes, dislikes FROM __temp__comments
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__comments
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962A3A3123C7 ON comments (audio_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962A7294869C ON comments (article_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962AF675F31B ON comments (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__user AS SELECT id, email, roles, password, firstname, lastname, username FROM user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
            , password VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, username VARCHAR(255) NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO user (id, email, roles, password, firstname, lastname, username) SELECT id, email, roles, password, firstname, lastname, username FROM __temp__user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__user
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__messenger_messages AS SELECT id, body, headers, queue_name, created_at, available_at, delivered_at FROM messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            )
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO messenger_messages (id, body, headers, queue_name, created_at, available_at, delivered_at) SELECT id, body, headers, queue_name, created_at, available_at, delivered_at FROM __temp__messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__article AS SELECT id, author_id, category_id, title, content, image_url, published_at, created_at, updated_at, slug, excerpt FROM article
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE article
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, content CLOB DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, published_at DATETIME DEFAULT NULL (DC2Type:datetime_immutable), created_at DATETIME NOT NULL (DC2Type:datetime_immutable)
            , updated_at DATETIME DEFAULT NULL (DC2Type:datetime_immutable)
            , slug VARCHAR(255) NOT NULL, excerpt CLOB DEFAULT NULL, CONSTRAINT FK_23A0E66F675F31B FOREIGN KEY (author_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO article (id, author_id, category_id, title, content, image, published_at, created_at, updated_at, slug, excerpt) SELECT id, author_id, category_id, title, content, image_url, published_at, created_at, updated_at, slug, excerpt FROM __temp__article
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__article
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_23A0E66F675F31B ON article (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__audio AS SELECT id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug FROM audio
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE audio
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE audio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, file VARCHAR(255) NOT NULL, cover VARCHAR(255) DEFAULT NULL, duration INTEGER NOT NULL, published_at DATETIME DEFAULT NULL (DC2Type:datetime_immutable), created_at DATETIME NOT NULL (DC2Type:datetime_immutable)
            , updated_at DATETIME DEFAULT NULL (DC2Type:datetime_immutable)
            , slug VARCHAR(255) NOT NULL, CONSTRAINT FK_187D3695F675F31B FOREIGN KEY (author_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_187D369512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO audio (id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug) SELECT id, author_id, category_id, title, description, file, cover, duration, published_at, created_at, updated_at, slug FROM __temp__audio
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
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__category AS SELECT id, name, description, slug, created_at, updated_at FROM category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL (DC2Type:datetime_immutable)
            , updated_at DATETIME DEFAULT NULL (DC2Type:datetime_immutable)
            )
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO category (id, name, description, slug, created_at, updated_at) SELECT id, name, description, slug, created_at, updated_at FROM __temp__category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__category
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__comments AS SELECT id, author_id, article_id, audio_id, content, created_at, updated_at, likes, dislikes FROM comments
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE comments
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE comments (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, article_id INTEGER DEFAULT NULL, audio_id INTEGER DEFAULT NULL, content VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL (DC2Type:datetime_immutable)
            , updated_at DATETIME NOT NULL (DC2Type:datetime_immutable)
            , likes INTEGER NOT NULL, dislikes INTEGER NOT NULL, CONSTRAINT FK_5F9E962AF675F31B FOREIGN KEY (author_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5F9E962A7294869C FOREIGN KEY (article_id) REFERENCES article (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5F9E962A3A3123C7 FOREIGN KEY (audio_id) REFERENCES audio (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO comments (id, author_id, article_id, audio_id, content, created_at, updated_at, likes, dislikes) SELECT id, author_id, article_id, audio_id, content, created_at, updated_at, likes, dislikes FROM __temp__comments
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__comments
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962AF675F31B ON comments (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962A7294869C ON comments (article_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962A3A3123C7 ON comments (audio_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__messenger_messages AS SELECT id, body, headers, queue_name, created_at, available_at, delivered_at FROM messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL (DC2Type:datetime_immutable)
            , available_at DATETIME NOT NULL (DC2Type:datetime_immutable), delivered_at DATETIME DEFAULT NULL (DC2Type:datetime_immutable)
            )
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO messenger_messages (id, body, headers, queue_name, created_at, available_at, delivered_at) SELECT id, body, headers, queue_name, created_at, available_at, delivered_at FROM __temp__messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__user AS SELECT id, email, roles, password, firstname, lastname, username FROM user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL (DC2Type:json)
            , password VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, username VARCHAR(255) NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO user (id, email, roles, password, firstname, lastname, username) SELECT id, email, roles, password, firstname, lastname, username FROM __temp__user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__user
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)
        SQL);
    }
}
