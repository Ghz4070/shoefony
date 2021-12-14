<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214200950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE sto_product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description CLOB NOT NULL, price NUMERIC(10, 2) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , name VARCHAR(255) NOT NULL)');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE product');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL COLLATE BINARY, last_name VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, message VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description CLOB NOT NULL COLLATE BINARY, price NUMERIC(10, 2) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , name VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('DROP TABLE app_contact');
        $this->addSql('DROP TABLE sto_product');
    }
}
