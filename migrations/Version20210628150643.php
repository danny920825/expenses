<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628150643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operacion (id INT AUTO_INCREMENT NOT NULL, categoria_id INT DEFAULT NULL, tipo VARCHAR(255) NOT NULL, cantidad DOUBLE PRECISION NOT NULL, descripcion VARCHAR(255) NOT NULL, INDEX IDX_D44FC94B3397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operacion ADD CONSTRAINT FK_D44FC94B3397707A FOREIGN KEY (categoria_id) REFERENCES categorias (id)');
        $this->addSql('DROP TABLE gastos');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gastos (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, cantidad DOUBLE PRECISION NOT NULL, descripcion VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, moneda VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_17A58AC3397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE gastos ADD CONSTRAINT FK_17A58AC3397707A FOREIGN KEY (categoria_id) REFERENCES categorias (id)');
        $this->addSql('DROP TABLE operacion');
    }
}
