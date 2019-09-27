<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190927171440 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD adress_billing_id INT DEFAULT NULL, ADD adress_delivery_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649115C78D4 FOREIGN KEY (adress_billing_id) REFERENCES adress_billing (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E05B374B FOREIGN KEY (adress_delivery_id) REFERENCES adress_delivery (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649115C78D4 ON user (adress_billing_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E05B374B ON user (adress_delivery_id)');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier_product CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE panier CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier_product CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE image_id image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649115C78D4');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E05B374B');
        $this->addSql('DROP INDEX UNIQ_8D93D649115C78D4 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649E05B374B ON user');
        $this->addSql('ALTER TABLE user DROP adress_billing_id, DROP adress_delivery_id, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
