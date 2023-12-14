<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231214101237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE match_volley (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, id_equipe_vainqueur INT DEFAULT NULL, id_equipe_perdant INT DEFAULT NULL, score VARCHAR(3) DEFAULT NULL, duree TIME DEFAULT NULL, date_match DATE NOT NULL, INDEX IDX_D7DA7A6761190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE match_volley ADD CONSTRAINT FK_D7DA7A6761190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_volley DROP FOREIGN KEY FK_D7DA7A6761190A32');
        $this->addSql('DROP TABLE match_volley');
    }
}
