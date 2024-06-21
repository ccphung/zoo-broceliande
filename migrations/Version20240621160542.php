<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240621160542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE feed (id INT AUTO_INCREMENT NOT NULL, food_id INT NOT NULL, animal_id INT NOT NULL, quantity INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_234044ABBA8E87C4 (food_id), INDEX IDX_234044AB8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feed ADD CONSTRAINT FK_234044ABBA8E87C4 FOREIGN KEY (food_id) REFERENCES food (id)');
        $this->addSql('ALTER TABLE feed ADD CONSTRAINT FK_234044AB8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE feed DROP FOREIGN KEY FK_234044ABBA8E87C4');
        $this->addSql('ALTER TABLE feed DROP FOREIGN KEY FK_234044AB8E962C16');
        $this->addSql('DROP TABLE feed');
    }
}
