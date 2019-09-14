<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190818150115 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634ABA7A01B');
        $this->addSql('DROP INDEX IDX_497DD634ABA7A01B ON categorie');
        $this->addSql('ALTER TABLE categorie ADD parent_categorie_id INT DEFAULT NULL, DROP sub_categorie_id');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634EC9BBA03 FOREIGN KEY (parent_categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_497DD634EC9BBA03 ON categorie (parent_categorie_id)');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adress_id adress_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE product_detail CHANGE product_id product_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634EC9BBA03');
        $this->addSql('DROP INDEX IDX_497DD634EC9BBA03 ON categorie');
        $this->addSql('ALTER TABLE categorie ADD sub_categorie_id INT DEFAULT NULL, DROP parent_categorie_id');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634ABA7A01B FOREIGN KEY (sub_categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_497DD634ABA7A01B ON categorie (sub_categorie_id)');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_detail CHANGE product_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adress_id adress_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
