<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241103021247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, client_id_id INT DEFAULT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, type VARCHAR(255) NOT NULL, statut VARCHAR(50) DEFAULT NULL, prix INT DEFAULT NULL, date_create DATETIME NOT NULL, date_delete DATETIME DEFAULT NULL, date_update DATETIME DEFAULT NULL, INDEX IDX_351268BBDC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBDC2902E0 FOREIGN KEY (client_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD date_create DATETIME NOT NULL, CHANGE nb_articles article_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D8F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D8F3EC46 ON commande (article_id_id)');
        $this->addSql('ALTER TABLE reparation DROP FOREIGN KEY FK_8FDF219D8F3EC46');
        $this->addSql('DROP INDEX IDX_8FDF219D8F3EC46 ON reparation');
        $this->addSql('ALTER TABLE reparation ADD commande_id_id INT NOT NULL, ADD date DATETIME NOT NULL, DROP article_id_id');
        $this->addSql('ALTER TABLE reparation ADD CONSTRAINT FK_8FDF219D462C4194 FOREIGN KEY (commande_id_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_8FDF219D462C4194 ON reparation (commande_id_id)');
        $this->addSql('ALTER TABLE transaction ADD client_id_id INT DEFAULT NULL, ADD user_create_id INT DEFAULT NULL, CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1DC2902E0 FOREIGN KEY (client_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1EEFE5067 FOREIGN KEY (user_create_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_723705D1DC2902E0 ON transaction (client_id_id)');
        $this->addSql('CREATE INDEX IDX_723705D1EEFE5067 ON transaction (user_create_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BBDC2902E0');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D8F3EC46');
        $this->addSql('DROP INDEX IDX_6EEAA67D8F3EC46 ON commande');
        $this->addSql('ALTER TABLE commande DROP date_create, CHANGE article_id_id nb_articles INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reparation DROP FOREIGN KEY FK_8FDF219D462C4194');
        $this->addSql('DROP INDEX IDX_8FDF219D462C4194 ON reparation');
        $this->addSql('ALTER TABLE reparation ADD article_id_id INT DEFAULT NULL, DROP commande_id_id, DROP date');
        $this->addSql('ALTER TABLE reparation ADD CONSTRAINT FK_8FDF219D8F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8FDF219D8F3EC46 ON reparation (article_id_id)');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1DC2902E0');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1EEFE5067');
        $this->addSql('DROP INDEX IDX_723705D1DC2902E0 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1EEFE5067 ON transaction');
        $this->addSql('ALTER TABLE transaction DROP client_id_id, DROP user_create_id, CHANGE date date DATETIME NOT NULL');
    }
}
