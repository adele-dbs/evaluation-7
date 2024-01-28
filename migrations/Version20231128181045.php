<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128181045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_advert ADD valid_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_advert ADD CONSTRAINT FK_4F5D98AD8134AC FOREIGN KEY (valid_id_id) REFERENCES validation_status (id)');
        $this->addSql('CREATE INDEX IDX_4F5D98AD8134AC ON job_advert (valid_id_id)');
        $this->addSql('ALTER TABLE `right` DROP FOREIGN KEY FK_B4CA7514A76ED395');
        $this->addSql('DROP INDEX IDX_B4CA7514A76ED395 ON `right`');
        $this->addSql('ALTER TABLE `right` DROP user_id');
        $this->addSql('ALTER TABLE user ADD right_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64954976835 FOREIGN KEY (right_id) REFERENCES `right` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64954976835 ON user (right_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `right` ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `right` ADD CONSTRAINT FK_B4CA7514A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B4CA7514A76ED395 ON `right` (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64954976835');
        $this->addSql('DROP INDEX IDX_8D93D64954976835 ON user');
        $this->addSql('ALTER TABLE user DROP right_id');
        $this->addSql('ALTER TABLE job_advert DROP FOREIGN KEY FK_4F5D98AD8134AC');
        $this->addSql('DROP INDEX IDX_4F5D98AD8134AC ON job_advert');
        $this->addSql('ALTER TABLE job_advert DROP valid_id_id');
    }
}
