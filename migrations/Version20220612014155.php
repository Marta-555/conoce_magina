<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612014155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividad_ocio ADD municipio_id INT NOT NULL');
        $this->addSql('ALTER TABLE actividad_ocio ADD CONSTRAINT FK_64B2B35358BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('CREATE INDEX IDX_64B2B35358BC1BE0 ON actividad_ocio (municipio_id)');
        $this->addSql('ALTER TABLE visita_guiada ADD municipio_id INT NOT NULL');
        $this->addSql('ALTER TABLE visita_guiada ADD CONSTRAINT FK_9EE3B50658BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('CREATE INDEX IDX_9EE3B50658BC1BE0 ON visita_guiada (municipio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividad_ocio DROP FOREIGN KEY FK_64B2B35358BC1BE0');
        $this->addSql('DROP INDEX IDX_64B2B35358BC1BE0 ON actividad_ocio');
        $this->addSql('ALTER TABLE actividad_ocio DROP municipio_id');
        $this->addSql('ALTER TABLE visita_guiada DROP FOREIGN KEY FK_9EE3B50658BC1BE0');
        $this->addSql('DROP INDEX IDX_9EE3B50658BC1BE0 ON visita_guiada');
        $this->addSql('ALTER TABLE visita_guiada DROP municipio_id');
    }
}
