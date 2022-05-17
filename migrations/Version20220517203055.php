<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517203055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE punto_interes (id INT AUTO_INCREMENT NOT NULL, ruta_id INT NOT NULL, descripcion VARCHAR(255) NOT NULL, coordenadas LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_513CDE59ABBC4845 (ruta_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ruta (id INT AUTO_INCREMENT NOT NULL, dificultad VARCHAR(255) NOT NULL, longitud VARCHAR(255) NOT NULL, tiempo VARCHAR(255) NOT NULL, coordenadas LONGTEXT NOT NULL, desnivel VARCHAR(255) NOT NULL, descripcion VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ruta_tipo_ruta (ruta_id INT NOT NULL, tipo_ruta_id INT NOT NULL, INDEX IDX_ACE0DC69ABBC4845 (ruta_id), INDEX IDX_ACE0DC69B84569E5 (tipo_ruta_id), PRIMARY KEY(ruta_id, tipo_ruta_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_ruta (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE punto_interes ADD CONSTRAINT FK_513CDE59ABBC4845 FOREIGN KEY (ruta_id) REFERENCES ruta (id)');
        $this->addSql('ALTER TABLE ruta_tipo_ruta ADD CONSTRAINT FK_ACE0DC69ABBC4845 FOREIGN KEY (ruta_id) REFERENCES ruta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ruta_tipo_ruta ADD CONSTRAINT FK_ACE0DC69B84569E5 FOREIGN KEY (tipo_ruta_id) REFERENCES tipo_ruta (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE punto_interes DROP FOREIGN KEY FK_513CDE59ABBC4845');
        $this->addSql('ALTER TABLE ruta_tipo_ruta DROP FOREIGN KEY FK_ACE0DC69ABBC4845');
        $this->addSql('ALTER TABLE ruta_tipo_ruta DROP FOREIGN KEY FK_ACE0DC69B84569E5');
        $this->addSql('DROP TABLE punto_interes');
        $this->addSql('DROP TABLE ruta');
        $this->addSql('DROP TABLE ruta_tipo_ruta');
        $this->addSql('DROP TABLE tipo_ruta');
    }
}
