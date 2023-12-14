<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231214102738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipes (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, classement VARCHAR(50) DEFAULT NULL, INDEX IDX_2449BA1561190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe_match_volley (equipe_id INT NOT NULL, match_volley_id INT NOT NULL, INDEX IDX_51C338426D861B89 (equipe_id), INDEX IDX_51C33842980FB2F4 (match_volley_id), PRIMARY KEY(equipe_id, match_volley_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipes ADD CONSTRAINT FK_2449BA1561190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE equipe_match_volley ADD CONSTRAINT FK_51C338426D861B89 FOREIGN KEY (equipe_id) REFERENCES equipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipe_match_volley ADD CONSTRAINT FK_51C33842980FB2F4 FOREIGN KEY (match_volley_id) REFERENCES match_volley (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipes DROP FOREIGN KEY FK_2449BA1561190A32');
        $this->addSql('ALTER TABLE equipe_match_volley DROP FOREIGN KEY FK_51C338426D861B89');
        $this->addSql('ALTER TABLE equipe_match_volley DROP FOREIGN KEY FK_51C33842980FB2F4');
        $this->addSql('DROP TABLE equipes');
        $this->addSql('DROP TABLE equipe_match_volley');
    }
}
