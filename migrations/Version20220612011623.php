<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612011623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alojamiento DROP FOREIGN KEY FK_26918125238957D9');
        $this->addSql('ALTER TABLE empresa_turismo DROP FOREIGN KEY FK_C936C838238957D9');
        $this->addSql('ALTER TABLE pub DROP FOREIGN KEY FK_5A443C85238957D9');
        $this->addSql('ALTER TABLE restaurante DROP FOREIGN KEY FK_5957C275238957D9');
        $this->addSql('DROP TABLE poblacion');
        $this->addSql('DROP INDEX IDX_26918125238957D9 ON alojamiento');
        $this->addSql('ALTER TABLE alojamiento CHANGE poblacion_id municipio_id INT NOT NULL');
        $this->addSql('ALTER TABLE alojamiento ADD CONSTRAINT FK_2691812558BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('CREATE INDEX IDX_2691812558BC1BE0 ON alojamiento (municipio_id)');
        $this->addSql('DROP INDEX IDX_C936C838238957D9 ON empresa_turismo');
        $this->addSql('ALTER TABLE empresa_turismo DROP poblacion_id');
        $this->addSql('ALTER TABLE municipio ADD habitantes INT NOT NULL');
        $this->addSql('DROP INDEX IDX_5A443C85238957D9 ON pub');
        $this->addSql('ALTER TABLE pub CHANGE poblacion_id municipio_id INT NOT NULL');
        $this->addSql('ALTER TABLE pub ADD CONSTRAINT FK_5A443C8558BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('CREATE INDEX IDX_5A443C8558BC1BE0 ON pub (municipio_id)');
        $this->addSql('DROP INDEX IDX_5957C275238957D9 ON restaurante');
        $this->addSql('ALTER TABLE restaurante CHANGE poblacion_id municipio_id INT NOT NULL');
        $this->addSql('ALTER TABLE restaurante ADD CONSTRAINT FK_5957C27558BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('CREATE INDEX IDX_5957C27558BC1BE0 ON restaurante (municipio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE poblacion (id INT AUTO_INCREMENT NOT NULL, municipio_id INT NOT NULL, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, habitantes INT NOT NULL, INDEX IDX_FED63A0958BC1BE0 (municipio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE poblacion ADD CONSTRAINT FK_FED63A0958BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
        $this->addSql('ALTER TABLE alojamiento DROP FOREIGN KEY FK_2691812558BC1BE0');
        $this->addSql('DROP INDEX IDX_2691812558BC1BE0 ON alojamiento');
        $this->addSql('ALTER TABLE alojamiento CHANGE municipio_id poblacion_id INT NOT NULL');
        $this->addSql('ALTER TABLE alojamiento ADD CONSTRAINT FK_26918125238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
        $this->addSql('CREATE INDEX IDX_26918125238957D9 ON alojamiento (poblacion_id)');
        $this->addSql('ALTER TABLE empresa_turismo ADD poblacion_id INT NOT NULL');
        $this->addSql('ALTER TABLE empresa_turismo ADD CONSTRAINT FK_C936C838238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
        $this->addSql('CREATE INDEX IDX_C936C838238957D9 ON empresa_turismo (poblacion_id)');
        $this->addSql('ALTER TABLE municipio DROP habitantes');
        $this->addSql('ALTER TABLE pub DROP FOREIGN KEY FK_5A443C8558BC1BE0');
        $this->addSql('DROP INDEX IDX_5A443C8558BC1BE0 ON pub');
        $this->addSql('ALTER TABLE pub CHANGE municipio_id poblacion_id INT NOT NULL');
        $this->addSql('ALTER TABLE pub ADD CONSTRAINT FK_5A443C85238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
        $this->addSql('CREATE INDEX IDX_5A443C85238957D9 ON pub (poblacion_id)');
        $this->addSql('ALTER TABLE restaurante DROP FOREIGN KEY FK_5957C27558BC1BE0');
        $this->addSql('DROP INDEX IDX_5957C27558BC1BE0 ON restaurante');
        $this->addSql('ALTER TABLE restaurante CHANGE municipio_id poblacion_id INT NOT NULL');
        $this->addSql('ALTER TABLE restaurante ADD CONSTRAINT FK_5957C275238957D9 FOREIGN KEY (poblacion_id) REFERENCES poblacion (id)');
        $this->addSql('CREATE INDEX IDX_5957C275238957D9 ON restaurante (poblacion_id)');
    }
}
