<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190811123731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product CHANGE mark_id mark_id INT DEFAULT NULL, CHANGE model_id model_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE product_detail CHANGE product_id product_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product CHANGE mark_id mark_id INT DEFAULT NULL, CHANGE model_id model_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_detail CHANGE product_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
