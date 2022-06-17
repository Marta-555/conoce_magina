<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220617204446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ruta (id INT AUTO_INCREMENT NOT NULL, municipio_id INT NOT NULL, user_id INT NOT NULL, tipo_ruta_id INT NOT NULL, titulo VARCHAR(255) NOT NULL, dificultad VARCHAR(255) NOT NULL, longitud DOUBLE PRECISION NOT NULL, tiempo DOUBLE PRECISION NOT NULL, mapa VARCHAR(255) NOT NULL, desnivel INT DEFAULT NULL, descripcion VARCHAR(1000) NOT NULL, image VARCHAR(255) DEFAULT NULL, fecha_publicacion DATETIME NOT NULL, INDEX IDX_C3AEF08C58BC1BE0 (municipio_id), INDEX IDX_C3AEF08CA76ED395 (user_id), INDEX IDX_C3AEF08CB84569E5 (tipo_ruta_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_ruta (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ruta ADD CONSTRAINT FK_C3AEF08C58BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('ALTER TABLE ruta ADD CONSTRAINT FK_C3AEF08CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ruta ADD CONSTRAINT FK_C3AEF08CB84569E5 FOREIGN KEY (tipo_ruta_id) REFERENCES tipo_ruta (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE punto_interes DROP FOREIGN KEY FK_513CDE59ABBC4845');
        $this->addSql('ALTER TABLE ruta DROP FOREIGN KEY FK_C3AEF08CB84569E5');
        $this->addSql('DROP TABLE ruta');
        $this->addSql('DROP TABLE tipo_ruta');
    }
}
