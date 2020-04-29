<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200429054855 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mascota (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, edad INT NOT NULL, peso INT DEFAULT NULL, vacunas JSON NOT NULL, esterilizacion TINYINT(1) NOT NULL, descripcion VARCHAR(255) NOT NULL, foto VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, dni INT NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, fecha_creacion DATE NOT NULL, fecha_modificacion DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario_mascota (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, id_mascota_id INT NOT NULL, fecha_creacion DATETIME NOT NULL, fecha_modificacion DATETIME DEFAULT NULL, INDEX IDX_680F27307EB2C349 (id_usuario_id), INDEX IDX_680F27305EEA4549 (id_mascota_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usuario_mascota ADD CONSTRAINT FK_680F27307EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usuario_mascota ADD CONSTRAINT FK_680F27305EEA4549 FOREIGN KEY (id_mascota_id) REFERENCES mascota (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE usuario_mascota DROP FOREIGN KEY FK_680F27305EEA4549');
        $this->addSql('ALTER TABLE usuario_mascota DROP FOREIGN KEY FK_680F27307EB2C349');
        $this->addSql('DROP TABLE mascota');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE usuario_mascota');
    }
}
