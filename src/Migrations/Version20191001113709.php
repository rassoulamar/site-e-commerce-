<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191001113709 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ville CHANGE country_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE image_id image_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adress_billing_id adress_billing_id INT DEFAULT NULL, CHANGE adress_delivery_id adress_delivery_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE adress_billing CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_order DROP FOREIGN KEY FK_5475E8C48D9F6D38');
        $this->addSql('DROP INDEX IDX_5475E8C48D9F6D38 ON product_order');
        $this->addSql('ALTER TABLE product_order ADD orders_id INT DEFAULT NULL, DROP order_id, CHANGE product_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C4CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_5475E8C4CFFE9AD6 ON product_order (orders_id)');
        $this->addSql('ALTER TABLE adress_delivery CHANGE ville_id ville_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adress_billing CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adress_delivery CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE image_id image_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE `order` CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_order DROP FOREIGN KEY FK_5475E8C4CFFE9AD6');
        $this->addSql('DROP INDEX IDX_5475E8C4CFFE9AD6 ON product_order');
        $this->addSql('ALTER TABLE product_order ADD order_id INT DEFAULT NULL, DROP orders_id, CHANGE product_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C48D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_5475E8C48D9F6D38 ON product_order (order_id)');
        $this->addSql('ALTER TABLE user CHANGE adress_billing_id adress_billing_id INT DEFAULT NULL, CHANGE adress_delivery_id adress_delivery_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE ville CHANGE country_id country_id INT DEFAULT NULL');
    }
}
