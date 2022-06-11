<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610230914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE restaurante (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, poblacion_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, telefono_1 INT NOT NULL, telefono_2 INT DEFAULT NULL, pagina_web VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_5957C2753397707A (categoria_id), INDEX IDX_5957C275238957D9 (poblacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE restaurante ADD CONSTRAINT FK_5957C2753397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE restaurante ADD CONSTRAINT FK_5957C275238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE restaurante');
    }
}
