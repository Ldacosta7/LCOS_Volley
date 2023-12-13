<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231213153806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, id_club_id INT DEFAULT NULL, libelle VARCHAR(150) NOT NULL, date_evenement DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_B26681EBF84A342 (id_club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EBF84A342 FOREIGN KEY (id_club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE club MODIFY id_club INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON club');
        $this->addSql('ALTER TABLE club CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE id_club id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE club ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EBF84A342');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('ALTER TABLE club MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON club');
        $this->addSql('ALTER TABLE club CHANGE adresse adresse VARCHAR(120) NOT NULL, CHANGE id id_club INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE club ADD PRIMARY KEY (id_club)');
    }
}
