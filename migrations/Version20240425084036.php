<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425084036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usuarios ADD ciudad_id INT DEFAULT NULL, DROP ciudad');
        $this->addSql('ALTER TABLE usuarios ADD CONSTRAINT FK_EF687F2E8608214 FOREIGN KEY (ciudad_id) REFERENCES ciudades (id)');
        $this->addSql('CREATE INDEX IDX_EF687F2E8608214 ON usuarios (ciudad_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usuarios DROP FOREIGN KEY FK_EF687F2E8608214');
        $this->addSql('DROP INDEX IDX_EF687F2E8608214 ON usuarios');
        $this->addSql('ALTER TABLE usuarios ADD ciudad VARCHAR(25) NOT NULL, DROP ciudad_id');
    }
}
