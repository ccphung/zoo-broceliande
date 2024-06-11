<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240611131026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, habitat_id INT NOT NULL, species_id INT NOT NULL, name VARCHAR(50) NOT NULL, state VARCHAR(50) NOT NULL, INDEX IDX_6AAB231FAFFE2D26 (habitat_id), INDEX IDX_6AAB231FB2A1D860 (species_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, habitat_remark LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, image_data LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vet_report (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, animal_id INT NOT NULL, date DATE NOT NULL, detail LONGTEXT NOT NULL, INDEX IDX_86438951A76ED395 (user_id), INDEX IDX_864389518E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FB2A1D860 FOREIGN KEY (species_id) REFERENCES species (id)');
        $this->addSql('ALTER TABLE vet_report ADD CONSTRAINT FK_86438951A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vet_report ADD CONSTRAINT FK_864389518E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE user ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FAFFE2D26');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FB2A1D860');
        $this->addSql('ALTER TABLE vet_report DROP FOREIGN KEY FK_86438951A76ED395');
        $this->addSql('ALTER TABLE vet_report DROP FOREIGN KEY FK_864389518E962C16');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE habitat');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE vet_report');
        $this->addSql('DROP INDEX IDX_8D93D649D60322AC ON user');
        $this->addSql('ALTER TABLE user DROP role_id');
    }
}
