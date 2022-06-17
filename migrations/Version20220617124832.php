<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220617124832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE punto_interes ADD titulo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ruta ADD municipio_id INT NOT NULL, ADD titulo VARCHAR(255) NOT NULL, ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ruta ADD CONSTRAINT FK_C3AEF08C58BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('CREATE INDEX IDX_C3AEF08C58BC1BE0 ON ruta (municipio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE punto_interes DROP titulo');
        $this->addSql('ALTER TABLE ruta DROP FOREIGN KEY FK_C3AEF08C58BC1BE0');
        $this->addSql('DROP INDEX IDX_C3AEF08C58BC1BE0 ON ruta');
        $this->addSql('ALTER TABLE ruta DROP municipio_id, DROP titulo, DROP image');
    }
}
