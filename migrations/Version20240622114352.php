<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240622114352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vet_report ADD suggested_food_id INT NOT NULL, ADD animal_condition VARCHAR(255) NOT NULL, ADD food_quantity INT NOT NULL, ADD visit_date DATETIME NOT NULL, ADD animal_condition_detail LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE vet_report ADD CONSTRAINT FK_86438951F887D821 FOREIGN KEY (suggested_food_id) REFERENCES food (id)');
        $this->addSql('CREATE INDEX IDX_86438951F887D821 ON vet_report (suggested_food_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vet_report DROP FOREIGN KEY FK_86438951F887D821');
        $this->addSql('DROP INDEX IDX_86438951F887D821 ON vet_report');
        $this->addSql('ALTER TABLE vet_report DROP suggested_food_id, DROP animal_condition, DROP food_quantity, DROP visit_date, DROP animal_condition_detail');
    }
}
