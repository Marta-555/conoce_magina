<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220611014748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empresa_turismo (id INT AUTO_INCREMENT NOT NULL, tipo_empresa_id INT NOT NULL, poblacion_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, telefono_1 INT NOT NULL, telefono_2 INT DEFAULT NULL, pagina_web VARCHAR(255) DEFAULT NULL, INDEX IDX_C936C838C3981BB9 (tipo_empresa_id), INDEX IDX_C936C838238957D9 (poblacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE empresa_turismo ADD CONSTRAINT FK_C936C838C3981BB9 FOREIGN KEY (tipo_empresa_id) REFERENCES tipo_empresa (id)');
        $this->addSql('ALTER TABLE empresa_turismo ADD CONSTRAINT FK_C936C838238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividad_ocio DROP FOREIGN KEY FK_64B2B353521E1991');
        $this->addSql('ALTER TABLE visita_guiada DROP FOREIGN KEY FK_9EE3B506521E1991');
        $this->addSql('DROP TABLE empresa_turismo');
    }
}
