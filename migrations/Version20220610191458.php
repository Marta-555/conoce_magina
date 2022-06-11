<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610191458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE municipio (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, altitud INT NOT NULL, superficie DOUBLE PRECISION NOT NULL, latitud DOUBLE PRECISION NOT NULL, longitud DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poblacion (id INT AUTO_INCREMENT NOT NULL, municipio_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, codigo_postal INT NOT NULL, habitantes INT NOT NULL, INDEX IDX_FED63A0958BC1BE0 (municipio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poblacion ADD CONSTRAINT FK_FED63A0958BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poblacion DROP FOREIGN KEY FK_FED63A0958BC1BE0');
        $this->addSql('ALTER TABLE alojamiento DROP FOREIGN KEY FK_26918125238957D9');
        $this->addSql('ALTER TABLE empresa_turismo DROP FOREIGN KEY FK_C936C838238957D9');
        $this->addSql('ALTER TABLE pub DROP FOREIGN KEY FK_5A443C85238957D9');
        $this->addSql('ALTER TABLE restaurante DROP FOREIGN KEY FK_5957C275238957D9');
        $this->addSql('DROP TABLE municipio');
        $this->addSql('DROP TABLE poblacion');
    }
}
