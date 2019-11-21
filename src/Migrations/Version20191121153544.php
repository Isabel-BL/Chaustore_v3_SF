<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191121153544 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX name ON brand');
        $this->addSql('ALTER TABLE brand DROP logo, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX name ON category');
        $this->addSql('ALTER TABLE category CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX name ON color');
        $this->addSql('ALTER TABLE color CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX name ON product');
        $this->addSql('ALTER TABLE product DROP image, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE category_id category_id INT NOT NULL, CHANGE brand_id brand_id INT NOT NULL, CHANGE color_id color_id INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE price price VARCHAR(255) NOT NULL, CHANGE gender gender VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product RENAME INDEX product_category TO IDX_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE product RENAME INDEX product_brand TO IDX_D34A04AD44F5D008');
        $this->addSql('ALTER TABLE product RENAME INDEX product_color TO IDX_D34A04AD7ADA1FB5');
        $this->addSql('DROP INDEX name ON size');
        $this->addSql('ALTER TABLE size CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE stock CHANGE product_id product_id INT NOT NULL, CHANGE size_id size_id INT NOT NULL, CHANGE stock stock INT NOT NULL');
        $this->addSql('ALTER TABLE stock RENAME INDEX size_product TO IDX_4B365660498DA827');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE brand ADD logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(63) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX name ON brand (name)');
        $this->addSql('ALTER TABLE category CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(63) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX name ON category (name)');
        $this->addSql('ALTER TABLE color CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(31) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX name ON color (name)');
        $this->addSql('ALTER TABLE product ADD image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE category_id category_id INT UNSIGNED NOT NULL, CHANGE brand_id brand_id INT UNSIGNED NOT NULL, CHANGE color_id color_id INT UNSIGNED NOT NULL, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE price price NUMERIC(5, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL, CHANGE gender gender CHAR(1) CHARACTER SET utf8mb4 DEFAULT \'M\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE INDEX name ON product (name(191))');
        $this->addSql('ALTER TABLE product RENAME INDEX idx_d34a04ad7ada1fb5 TO product_color');
        $this->addSql('ALTER TABLE product RENAME INDEX idx_d34a04ad44f5d008 TO product_brand');
        $this->addSql('ALTER TABLE product RENAME INDEX idx_d34a04ad12469de2 TO product_category');
        $this->addSql('ALTER TABLE size CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX name ON size (name)');
        $this->addSql('ALTER TABLE stock CHANGE product_id product_id INT UNSIGNED NOT NULL, CHANGE size_id size_id INT UNSIGNED NOT NULL, CHANGE stock stock INT UNSIGNED DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE stock RENAME INDEX idx_4b365660498da827 TO size_product');
    }
}
