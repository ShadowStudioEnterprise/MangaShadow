<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209085353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capitulos (id INT AUTO_INCREMENT NOT NULL, manga_id_id INT NOT NULL, uploader VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, fecha_subida DATETIME NOT NULL, INDEX IDX_6622F458E9126230 (manga_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE capitulos ADD CONSTRAINT FK_6622F458E9126230 FOREIGN KEY (manga_id_id) REFERENCES manga (id)');
        $this->addSql('ALTER TABLE manga CHANGE puntuacion puntuacion INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE capitulos');
        $this->addSql('ALTER TABLE manga CHANGE puntuacion puntuacion INT DEFAULT NULL');
    }
}
