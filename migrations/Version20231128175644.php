<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128175644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD validation_status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E0AE11FF FOREIGN KEY (validation_status_id) REFERENCES validation_status (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649E0AE11FF ON user (validation_status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E0AE11FF');
        $this->addSql('DROP INDEX IDX_8D93D649E0AE11FF ON user');
        $this->addSql('ALTER TABLE user DROP validation_status_id');
    }
}
