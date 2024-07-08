<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708095118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('CREATE TABLE feed (id INT AUTO_INCREMENT NOT NULL, food_id INT NOT NULL, animal_id INT NOT NULL, quantity INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_234044ABBA8E87C4 (food_id), INDEX IDX_234044AB8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE food (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feed ADD CONSTRAINT FK_234044ABBA8E87C4 FOREIGN KEY (food_id) REFERENCES food (id)');
        $this->addSql('ALTER TABLE feed ADD CONSTRAINT FK_234044AB8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FAFFE2D26');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE role');
        $this->addSql('ALTER TABLE animal ADD image_name VARCHAR(255) NOT NULL, ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP state');
        $this->addSql('ALTER TABLE habitat ADD image_name VARCHAR(255) NOT NULL, ADD updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE habitat_remark habitat_remark LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD212469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD212469DE2 ON service (category_id)');
        $this->addSql('DROP INDEX IDX_8D93D649D60322AC ON user');
        $this->addSql('ALTER TABLE user DROP role_id');
        $this->addSql('ALTER TABLE vet_report ADD suggested_food_id INT NOT NULL, ADD animal_condition VARCHAR(255) NOT NULL, ADD food_quantity INT NOT NULL, ADD visit_date DATETIME NOT NULL, ADD animal_condition_detail LONGTEXT DEFAULT NULL, DROP date, DROP detail');
        $this->addSql('ALTER TABLE vet_report ADD CONSTRAINT FK_86438951F887D821 FOREIGN KEY (suggested_food_id) REFERENCES food (id)');
        $this->addSql('CREATE INDEX IDX_86438951F887D821 ON vet_report (suggested_food_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vet_report DROP FOREIGN KEY FK_86438951F887D821');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, habitat_id INT DEFAULT NULL, image_data LONGBLOB NOT NULL, INDEX IDX_C53D045FAFFE2D26 (habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE feed DROP FOREIGN KEY FK_234044ABBA8E87C4');
        $this->addSql('ALTER TABLE feed DROP FOREIGN KEY FK_234044AB8E962C16');
        $this->addSql('DROP TABLE feed');
        $this->addSql('DROP TABLE food');
        $this->addSql('ALTER TABLE animal ADD state VARCHAR(50) NOT NULL, DROP image_name, DROP updated_at');
        $this->addSql('ALTER TABLE habitat DROP image_name, DROP updated_at, CHANGE habitat_remark habitat_remark LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD212469DE2');
        $this->addSql('DROP INDEX IDX_E19D9AD212469DE2 ON service');
        $this->addSql('ALTER TABLE service DROP category_id');
        $this->addSql('ALTER TABLE user ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
        $this->addSql('DROP INDEX IDX_86438951F887D821 ON vet_report');
        $this->addSql('ALTER TABLE vet_report ADD date DATE NOT NULL, ADD detail LONGTEXT NOT NULL, DROP suggested_food_id, DROP animal_condition, DROP food_quantity, DROP visit_date, DROP animal_condition_detail');
    }
}
