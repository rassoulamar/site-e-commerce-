<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191001122109 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product ADD ligne_commande_id INT DEFAULT NULL, CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE10FEE63 FOREIGN KEY (ligne_commande_id) REFERENCES ligne_commande (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADE10FEE63 ON product (ligne_commande_id)');
        $this->addSql('ALTER TABLE categorie CHANGE image_id image_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adress_billing_id adress_billing_id INT DEFAULT NULL, CHANGE adress_delivery_id adress_delivery_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE ville CHANGE country_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_commande CHANGE commande_id commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adress_billing CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adress_delivery CHANGE ville_id ville_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adress_billing CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adress_delivery CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE image_id image_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE commande CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_commande CHANGE commande_id commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE10FEE63');
        $this->addSql('DROP INDEX IDX_D34A04ADE10FEE63 ON product');
        $this->addSql('ALTER TABLE product DROP ligne_commande_id, CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adress_billing_id adress_billing_id INT DEFAULT NULL, CHANGE adress_delivery_id adress_delivery_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE ville CHANGE country_id country_id INT DEFAULT NULL');
    }
}
