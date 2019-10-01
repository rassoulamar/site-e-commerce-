<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191001110626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE panier_product DROP FOREIGN KEY FK_29F0C02CF77D927C');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_F5299398A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_order (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, panier_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_5475E8C44584665A (product_id), INDEX IDX_5475E8C4F77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C44584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C4F77D927C FOREIGN KEY (panier_id) REFERENCES `order` (id)');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE panier_product');
        $this->addSql('ALTER TABLE ville CHANGE country_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE image_id image_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adress_billing_id adress_billing_id INT DEFAULT NULL, CHANGE adress_delivery_id adress_delivery_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE adress_billing CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adress_delivery CHANGE ville_id ville_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_order DROP FOREIGN KEY FK_5475E8C4F77D927C');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_24CC0DF2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE panier_product (id INT AUTO_INCREMENT NOT NULL, panier_id INT DEFAULT NULL, product_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_29F0C02C4584665A (product_id), INDEX IDX_29F0C02CF77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE panier_product ADD CONSTRAINT FK_29F0C02C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE panier_product ADD CONSTRAINT FK_29F0C02CF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE product_order');
        $this->addSql('ALTER TABLE adress_billing CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adress_delivery CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE image_id image_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adress_billing_id adress_billing_id INT DEFAULT NULL, CHANGE adress_delivery_id adress_delivery_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE ville CHANGE country_id country_id INT DEFAULT NULL');
    }
}
