<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240614163704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hours ADD day VARCHAR(8) NOT NULL, ADD open VARCHAR(5) NOT NULL, ADD close VARCHAR(5) NOT NULL, DROP mon_open, DROP mon_close, DROP tues_open, DROP tues_close, DROP wen_open, DROP wen_close, DROP thru_open, DROP thru_close, DROP fri_open, DROP fri_close, DROP sat_open, DROP sat_close, DROP sun_open, DROP sun_close');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hours ADD mon_open VARCHAR(5) NOT NULL, ADD mon_close VARCHAR(5) NOT NULL, ADD tues_open VARCHAR(5) NOT NULL, ADD tues_close VARCHAR(5) NOT NULL, ADD wen_open VARCHAR(5) NOT NULL, ADD wen_close VARCHAR(5) NOT NULL, ADD thru_open VARCHAR(5) NOT NULL, ADD thru_close VARCHAR(5) NOT NULL, ADD fri_open VARCHAR(5) NOT NULL, ADD fri_close VARCHAR(5) NOT NULL, ADD sat_open VARCHAR(5) NOT NULL, ADD sat_close VARCHAR(5) NOT NULL, ADD sun_open VARCHAR(5) NOT NULL, ADD sun_close VARCHAR(5) NOT NULL, DROP day, DROP open, DROP close');
    }
}
