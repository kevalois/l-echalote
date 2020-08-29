<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200826142357 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, descriptif LONGTEXT DEFAULT NULL, actif TINYINT(1) NOT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gulp DROP FOREIGN KEY FK_4CC2EF8AC9C7CEB6');
        $this->addSql('ALTER TABLE gulp CHANGE carte_id carte_id INT NOT NULL');
        $this->addSql('ALTER TABLE gulp ADD CONSTRAINT FK_4CC2EF8AC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE image');
        $this->addSql('ALTER TABLE gulp DROP FOREIGN KEY FK_4CC2EF8AC9C7CEB6');
        $this->addSql('ALTER TABLE gulp CHANGE carte_id carte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gulp ADD CONSTRAINT FK_4CC2EF8AC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
