<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128182711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant DROP user_id');
        $this->addSql('ALTER TABLE application DROP applicant_id, DROP id_job_advert, CHANGE validation_id validation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1A2274850 FOREIGN KEY (validation_id) REFERENCES validation_status (id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC1A2274850 ON application (validation_id)');
        $this->addSql('ALTER TABLE job_advert DROP FOREIGN KEY FK_4F5D98AD8134AC');
        $this->addSql('DROP INDEX IDX_4F5D98AD8134AC ON job_advert');
        $this->addSql('ALTER TABLE job_advert DROP valid_id_id, DROP recuitment_id, CHANGE validation_id validation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_advert ADD CONSTRAINT FK_4F5D98AA2274850 FOREIGN KEY (validation_id) REFERENCES validation_status (id)');
        $this->addSql('CREATE INDEX IDX_4F5D98AA2274850 ON job_advert (validation_id)');
        $this->addSql('ALTER TABLE recruitment DROP user_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E0AE11FF');
        $this->addSql('DROP INDEX IDX_8D93D649E0AE11FF ON user');
        $this->addSql('ALTER TABLE user ADD aplicant_id_id INT DEFAULT NULL, ADD recruitment_id_id INT DEFAULT NULL, CHANGE validation_status_id validation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A2274850 FOREIGN KEY (validation_id) REFERENCES validation_status (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649946C5D65 FOREIGN KEY (aplicant_id_id) REFERENCES applicant (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64995F3C167 FOREIGN KEY (recruitment_id_id) REFERENCES recruitment (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A2274850 ON user (validation_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649946C5D65 ON user (aplicant_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64995F3C167 ON user (recruitment_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE recruitment ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1A2274850');
        $this->addSql('DROP INDEX IDX_A45BDDC1A2274850 ON application');
        $this->addSql('ALTER TABLE application ADD applicant_id INT NOT NULL, ADD id_job_advert INT NOT NULL, CHANGE validation_id validation_id INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A2274850');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649946C5D65');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64995F3C167');
        $this->addSql('DROP INDEX IDX_8D93D649A2274850 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649946C5D65 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D64995F3C167 ON user');
        $this->addSql('ALTER TABLE user ADD validation_status_id INT DEFAULT NULL, DROP validation_id, DROP aplicant_id_id, DROP recruitment_id_id');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E0AE11FF FOREIGN KEY (validation_status_id) REFERENCES validation_status (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D649E0AE11FF ON user (validation_status_id)');
        $this->addSql('ALTER TABLE job_advert DROP FOREIGN KEY FK_4F5D98AA2274850');
        $this->addSql('DROP INDEX IDX_4F5D98AA2274850 ON job_advert');
        $this->addSql('ALTER TABLE job_advert ADD valid_id_id INT DEFAULT NULL, ADD recuitment_id INT NOT NULL, CHANGE validation_id validation_id INT NOT NULL');
        $this->addSql('ALTER TABLE job_advert ADD CONSTRAINT FK_4F5D98AD8134AC FOREIGN KEY (valid_id_id) REFERENCES validation_status (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4F5D98AD8134AC ON job_advert (valid_id_id)');
    }
}
