<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231214104247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entraineur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, age INT NOT NULL, adresse VARCHAR(120) DEFAULT NULL, email VARCHAR(50) NOT NULL, chemin_photo VARCHAR(255) DEFAULT NULL, genre VARCHAR(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entraineur_equipe (entraineur_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_97E34CE3F8478A1 (entraineur_id), INDEX IDX_97E34CE36D861B89 (equipe_id), PRIMARY KEY(entraineur_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, numero_licence VARCHAR(25) NOT NULL, numero INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, age INT NOT NULL, date_naissance DATE NOT NULL, taille INT DEFAULT NULL, poste VARCHAR(50) NOT NULL, nationalite VARCHAR(50) DEFAULT NULL, chemin_photo VARCHAR(255) DEFAULT NULL, genre VARCHAR(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_equipe (joueur_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_CDF2AA99A9E2D76C (joueur_id), INDEX IDX_CDF2AA996D861B89 (equipe_id), PRIMARY KEY(joueur_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entraineur_equipe ADD CONSTRAINT FK_97E34CE3F8478A1 FOREIGN KEY (entraineur_id) REFERENCES entraineur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entraineur_equipe ADD CONSTRAINT FK_97E34CE36D861B89 FOREIGN KEY (equipe_id) REFERENCES equipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_equipe ADD CONSTRAINT FK_CDF2AA99A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_equipe ADD CONSTRAINT FK_CDF2AA996D861B89 FOREIGN KEY (equipe_id) REFERENCES equipes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entraineur_equipe DROP FOREIGN KEY FK_97E34CE3F8478A1');
        $this->addSql('ALTER TABLE entraineur_equipe DROP FOREIGN KEY FK_97E34CE36D861B89');
        $this->addSql('ALTER TABLE joueur_equipe DROP FOREIGN KEY FK_CDF2AA99A9E2D76C');
        $this->addSql('ALTER TABLE joueur_equipe DROP FOREIGN KEY FK_CDF2AA996D861B89');
        $this->addSql('DROP TABLE entraineur');
        $this->addSql('DROP TABLE entraineur_equipe');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE joueur_equipe');
    }
}
