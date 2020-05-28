<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200526003917 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fotos (id INT AUTO_INCREMENT NOT NULL, usuario_mascota_id INT NOT NULL, imagen VARCHAR(255) NOT NULL, INDEX IDX_CB8405C78508F3C (usuario_mascota_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mascota (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, edad INT NOT NULL, esterilizacion VARCHAR(255) NOT NULL, vacunas TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, dni VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario_mascota (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, mascota_id INT NOT NULL, INDEX IDX_680F2730DB38439E (usuario_id), INDEX IDX_680F2730FB60C59E (mascota_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C78508F3C FOREIGN KEY (usuario_mascota_id) REFERENCES usuario_mascota (id)');
        $this->addSql('ALTER TABLE usuario_mascota ADD CONSTRAINT FK_680F2730DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usuario_mascota ADD CONSTRAINT FK_680F2730FB60C59E FOREIGN KEY (mascota_id) REFERENCES mascota (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE usuario_mascota DROP FOREIGN KEY FK_680F2730FB60C59E');
        $this->addSql('ALTER TABLE usuario_mascota DROP FOREIGN KEY FK_680F2730DB38439E');
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C78508F3C');
        $this->addSql('DROP TABLE fotos');
        $this->addSql('DROP TABLE mascota');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE usuario_mascota');
    }
}
