<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190927182734 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649115C78D4');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3115C78D4');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E05B374B');
        $this->addSql('DROP TABLE adress_billing');
        $this->addSql('DROP TABLE adress_delivery');
        $this->addSql('DROP INDEX UNIQ_8D93D649E05B374B ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649115C78D4 ON user');
        $this->addSql('ALTER TABLE user DROP adress_billing_id, DROP adress_delivery_id, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_43C3D9C3115C78D4 ON ville');
        $this->addSql('ALTER TABLE ville DROP adress_billing_id, CHANGE country_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier_product CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adress_billing (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE adress_delivery (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE panier CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier_product CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD adress_billing_id INT DEFAULT NULL, ADD adress_delivery_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649115C78D4 FOREIGN KEY (adress_billing_id) REFERENCES adress_billing (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E05B374B FOREIGN KEY (adress_delivery_id) REFERENCES adress_delivery (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E05B374B ON user (adress_delivery_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649115C78D4 ON user (adress_billing_id)');
        $this->addSql('ALTER TABLE ville ADD adress_billing_id INT DEFAULT NULL, CHANGE country_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3115C78D4 FOREIGN KEY (adress_billing_id) REFERENCES adress_billing (id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C3115C78D4 ON ville (adress_billing_id)');
    }
}
