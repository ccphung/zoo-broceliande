<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240614153355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE opening_hours (id INT AUTO_INCREMENT NOT NULL, mon_open VARCHAR(5) NOT NULL, mon_close VARCHAR(5) NOT NULL, tues_open VARCHAR(5) NOT NULL, tues_close VARCHAR(5) NOT NULL, wen_open VARCHAR(5) NOT NULL, wen_close VARCHAR(5) NOT NULL, thru_open VARCHAR(5) NOT NULL, thru_close VARCHAR(5) NOT NULL, fri_open VARCHAR(5) NOT NULL, fri_close VARCHAR(5) NOT NULL, sat_open VARCHAR(5) NOT NULL, sat_close VARCHAR(5) NOT NULL, sun_open VARCHAR(5) NOT NULL, sun_close VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE opening_hours');
    }
}
