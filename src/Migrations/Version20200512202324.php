<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200512202324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE basket (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, hash VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE basket_element (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, basket_id INTEGER NOT NULL, product_id INTEGER NOT NULL, quantity INTEGER DEFAULT 1 NOT NULL)');
        $this->addSql('CREATE INDEX IDX_85E74E201BE1FB52 ON basket_element (basket_id)');
        $this->addSql('CREATE INDEX IDX_85E74E204584665A ON basket_element (product_id)');
        $this->addSql('CREATE TABLE orders (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE order_element (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER NOT NULL, shop_order_id INTEGER NOT NULL, price INTEGER NOT NULL, quantity INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_B73AF7724584665A ON order_element (product_id)');
        $this->addSql('CREATE INDEX IDX_B73AF772562797AE ON order_element (shop_order_id)');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INTEGER NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE basket');
        $this->addSql('DROP TABLE basket_element');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE order_element');
        $this->addSql('DROP TABLE product');
    }
}
