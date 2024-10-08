<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722171004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favorite (id INT AUTO_INCREMENT NOT NULL, flag TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_favorite_product ADD favorite_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_favorite_product ADD CONSTRAINT FK_F30BE81EAA17481D FOREIGN KEY (favorite_id) REFERENCES favorite (id)');
        $this->addSql('CREATE INDEX IDX_F30BE81EAA17481D ON user_favorite_product (favorite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_favorite_product DROP FOREIGN KEY FK_F30BE81EAA17481D');
        $this->addSql('DROP TABLE favorite');
        $this->addSql('DROP INDEX IDX_F30BE81EAA17481D ON user_favorite_product');
        $this->addSql('ALTER TABLE user_favorite_product DROP favorite_id');
    }
}
