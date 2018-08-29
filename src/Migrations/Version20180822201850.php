<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180822201850 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE peloton (id INT AUTO_INCREMENT NOT NULL, tournament_id INT NOT NULL, max_participant INT NOT NULL, type INT NOT NULL, start_time TIME NOT NULL, INDEX IDX_D2D171E33D1A3E7 (tournament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE peloton ADD CONSTRAINT FK_D2D171E33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id)');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B1133D1A3E7');
        $this->addSql('DROP INDEX IDX_D79F6B1133D1A3E7 ON participant');
        $this->addSql('ALTER TABLE participant CHANGE tournament_id peloton_id INT NOT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B1130A593A4 FOREIGN KEY (peloton_id) REFERENCES peloton (id)');
        $this->addSql('CREATE INDEX IDX_D79F6B1130A593A4 ON participant (peloton_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B1130A593A4');
        $this->addSql('DROP TABLE peloton');
        $this->addSql('DROP INDEX IDX_D79F6B1130A593A4 ON participant');
        $this->addSql('ALTER TABLE participant CHANGE peloton_id tournament_id INT NOT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B1133D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id)');
        $this->addSql('CREATE INDEX IDX_D79F6B1133D1A3E7 ON participant (tournament_id)');
    }
}
