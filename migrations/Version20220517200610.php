<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517200610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actividad_ocio (id INT AUTO_INCREMENT NOT NULL, empresa_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(1000) NOT NULL, precio DOUBLE PRECISION NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_64B2B353521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE alojamiento (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, poblacion_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, telefono INT NOT NULL, pagina_web VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_269181253397707A (categoria_id), INDEX IDX_26918125238957D9 (poblacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresa_turismo (id INT AUTO_INCREMENT NOT NULL, tipo_empresa_id INT NOT NULL, poblacion_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, telefono INT NOT NULL, pagina_web VARCHAR(255) DEFAULT NULL, INDEX IDX_C936C838C3981BB9 (tipo_empresa_id), INDEX IDX_C936C838238957D9 (poblacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poblacion (id INT AUTO_INCREMENT NOT NULL, municipio_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, habitantes INT NOT NULL, INDEX IDX_FED63A0958BC1BE0 (municipio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pub (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, poblacion_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, telefono INT NOT NULL, pagina_web VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_5A443C853397707A (categoria_id), INDEX IDX_5A443C85238957D9 (poblacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurante (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, poblacion_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, telefono INT NOT NULL, pagina_web VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_5957C2753397707A (categoria_id), INDEX IDX_5957C275238957D9 (poblacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_empresa (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visita_guiada (id INT AUTO_INCREMENT NOT NULL, empresa_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(1000) NOT NULL, precio DOUBLE PRECISION NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_9EE3B506521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actividad_ocio ADD CONSTRAINT FK_64B2B353521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa_turismo (id)');
        $this->addSql('ALTER TABLE alojamiento ADD CONSTRAINT FK_269181253397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE alojamiento ADD CONSTRAINT FK_26918125238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
        $this->addSql('ALTER TABLE empresa_turismo ADD CONSTRAINT FK_C936C838C3981BB9 FOREIGN KEY (tipo_empresa_id) REFERENCES tipo_empresa (id)');
        $this->addSql('ALTER TABLE empresa_turismo ADD CONSTRAINT FK_C936C838238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
        $this->addSql('ALTER TABLE poblacion ADD CONSTRAINT FK_FED63A0958BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('ALTER TABLE pub ADD CONSTRAINT FK_5A443C853397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE pub ADD CONSTRAINT FK_5A443C85238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
        $this->addSql('ALTER TABLE restaurante ADD CONSTRAINT FK_5957C2753397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE restaurante ADD CONSTRAINT FK_5957C275238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
        $this->addSql('ALTER TABLE visita_guiada ADD CONSTRAINT FK_9EE3B506521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa_turismo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alojamiento DROP FOREIGN KEY FK_269181253397707A');
        $this->addSql('ALTER TABLE pub DROP FOREIGN KEY FK_5A443C853397707A');
        $this->addSql('ALTER TABLE restaurante DROP FOREIGN KEY FK_5957C2753397707A');
        $this->addSql('ALTER TABLE actividad_ocio DROP FOREIGN KEY FK_64B2B353521E1991');
        $this->addSql('ALTER TABLE visita_guiada DROP FOREIGN KEY FK_9EE3B506521E1991');
        $this->addSql('ALTER TABLE alojamiento DROP FOREIGN KEY FK_26918125238957D9');
        $this->addSql('ALTER TABLE empresa_turismo DROP FOREIGN KEY FK_C936C838238957D9');
        $this->addSql('ALTER TABLE pub DROP FOREIGN KEY FK_5A443C85238957D9');
        $this->addSql('ALTER TABLE restaurante DROP FOREIGN KEY FK_5957C275238957D9');
        $this->addSql('ALTER TABLE empresa_turismo DROP FOREIGN KEY FK_C936C838C3981BB9');
        $this->addSql('DROP TABLE actividad_ocio');
        $this->addSql('DROP TABLE alojamiento');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE empresa_turismo');
        $this->addSql('DROP TABLE poblacion');
        $this->addSql('DROP TABLE pub');
        $this->addSql('DROP TABLE restaurante');
        $this->addSql('DROP TABLE tipo_empresa');
        $this->addSql('DROP TABLE visita_guiada');
    }
}
