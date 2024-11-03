<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class VersionUserTest extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Suppression des utilisateurs si l'adresse email existe déjà
        $this->addSql("DELETE FROM user WHERE email = 'admin@example.com'");
        $this->addSql("DELETE FROM user WHERE email = 'employee@example.com'");
        $this->addSql("DELETE FROM user WHERE email = 'client@example.com'");

        // Insérer l'administrateur
        $this->addSql("INSERT INTO user (nom, prenom, email, roles, password, tel, adresse, date_create) VALUES ('Admin', 'User', 'admin@example.com', '[\"ROLE_ADMIN\"]', '$2y$13$fffQV4OJuCpvVrCuvtvpcuiJRqC5rGy74xdnTp6Ga8RwT5aRKxN4e', '0123456789', 'Adresse Admin', NOW())");

        // Insérer l'employé
        $this->addSql("INSERT INTO user (nom, prenom, email, roles, password, tel, adresse, date_create) VALUES ('Employee', 'User', 'employee@example.com', '[\"ROLE_EMPLOYER\"]', '$2y$13$atAo1v9AVyJN/s60R0nS8.S1Cks7p0pNpYO31dEuIAePrlKkXEjEu', '0123456789', 'Adresse Employee', NOW())");

        // Insérer l'utilisateur simple
        $this->addSql("INSERT INTO user (nom, prenom, email, roles, password, tel, adresse, date_create) VALUES ('Client', 'User', 'client@example.com', '[\"ROLE_CLIENT\"]', '$2y$13$2TGR89RQX0tFHk9wgFzRY.DSgnweE55KlbyoitbdZCwrtMKHVx1Ba', '0123456789', 'Adresse Client', NOW())");
    }

    public function down(Schema $schema): void
    {

    }
}
