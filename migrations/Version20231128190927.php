<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128190927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applicant_application (applicant_id INT NOT NULL, application_id INT NOT NULL, INDEX IDX_B4EE742E97139001 (applicant_id), INDEX IDX_B4EE742E3E030ACD (application_id), PRIMARY KEY(applicant_id, application_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE applicant_application ADD CONSTRAINT FK_B4EE742E97139001 FOREIGN KEY (applicant_id) REFERENCES applicant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE applicant_application ADD CONSTRAINT FK_B4EE742E3E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE applicant ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE applicant ADD CONSTRAINT FK_CAAD1019A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAAD1019A76ED395 ON applicant (user_id)');
        $this->addSql('ALTER TABLE application ADD job_advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC117CE23A7 FOREIGN KEY (job_advert_id) REFERENCES job_advert (id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC117CE23A7 ON application (job_advert_id)');
        $this->addSql('ALTER TABLE job_advert ADD recruitment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_advert ADD CONSTRAINT FK_4F5D98A115985E8 FOREIGN KEY (recruitment_id) REFERENCES recruitment (id)');
        $this->addSql('CREATE INDEX IDX_4F5D98A115985E8 ON job_advert (recruitment_id)');
        $this->addSql('ALTER TABLE recruitment ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recruitment ADD CONSTRAINT FK_C7238C6EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7238C6EA76ED395 ON recruitment (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649946C5D65');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64995F3C167');
        $this->addSql('DROP INDEX UNIQ_8D93D649946C5D65 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D64995F3C167 ON user');
        $this->addSql('ALTER TABLE user DROP aplicant_id_id, DROP recruitment_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant_application DROP FOREIGN KEY FK_B4EE742E97139001');
        $this->addSql('ALTER TABLE applicant_application DROP FOREIGN KEY FK_B4EE742E3E030ACD');
        $this->addSql('DROP TABLE applicant_application');
        $this->addSql('ALTER TABLE applicant DROP FOREIGN KEY FK_CAAD1019A76ED395');
        $this->addSql('DROP INDEX UNIQ_CAAD1019A76ED395 ON applicant');
        $this->addSql('ALTER TABLE applicant DROP user_id');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC117CE23A7');
        $this->addSql('DROP INDEX IDX_A45BDDC117CE23A7 ON application');
        $this->addSql('ALTER TABLE application DROP job_advert_id');
        $this->addSql('ALTER TABLE user ADD aplicant_id_id INT DEFAULT NULL, ADD recruitment_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649946C5D65 FOREIGN KEY (aplicant_id_id) REFERENCES applicant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64995F3C167 FOREIGN KEY (recruitment_id_id) REFERENCES recruitment (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649946C5D65 ON user (aplicant_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64995F3C167 ON user (recruitment_id_id)');
        $this->addSql('ALTER TABLE job_advert DROP FOREIGN KEY FK_4F5D98A115985E8');
        $this->addSql('DROP INDEX IDX_4F5D98A115985E8 ON job_advert');
        $this->addSql('ALTER TABLE job_advert DROP recruitment_id');
        $this->addSql('ALTER TABLE recruitment DROP FOREIGN KEY FK_C7238C6EA76ED395');
        $this->addSql('DROP INDEX UNIQ_C7238C6EA76ED395 ON recruitment');
        $this->addSql('ALTER TABLE recruitment DROP user_id');
    }
}
