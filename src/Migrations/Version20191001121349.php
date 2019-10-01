<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191001121349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE adress_billing_id adress_billing_id INT DEFAULT NULL, CHANGE adress_delivery_id adress_delivery_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE image_id image_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ville CHANGE country_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adress_billing CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DA76ED395 ON commande (user_id)');
        $this->addSql('ALTER TABLE adress_delivery CHANGE ville_id ville_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adress_billing CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adress_delivery CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE image_id image_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('DROP INDEX IDX_6EEAA67DA76ED395 ON commande');
        $this->addSql('ALTER TABLE commande DROP user_id');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adress_billing_id adress_billing_id INT DEFAULT NULL, CHANGE adress_delivery_id adress_delivery_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE ville CHANGE country_id country_id INT DEFAULT NULL');
    }
}
