<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180624094755 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE participant ADD archer_id INT NOT NULL, ADD category_id INT NOT NULL, ADD tournament_id INT NOT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B11147940E3 FOREIGN KEY (archer_id) REFERENCES archer (id)');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B1112469DE2 FOREIGN KEY (category_id) REFERENCES archer_category (id)');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B1133D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id)');
        $this->addSql('CREATE INDEX IDX_D79F6B11147940E3 ON participant (archer_id)');
        $this->addSql('CREATE INDEX IDX_D79F6B1112469DE2 ON participant (category_id)');
        $this->addSql('CREATE INDEX IDX_D79F6B1133D1A3E7 ON participant (tournament_id)');
        $this->addSql('ALTER TABLE tournament ADD organizer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tournament ADD CONSTRAINT FK_BD5FB8D9876C4DDA FOREIGN KEY (organizer_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_BD5FB8D9876C4DDA ON tournament (organizer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B11147940E3');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B1112469DE2');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B1133D1A3E7');
        $this->addSql('DROP INDEX IDX_D79F6B11147940E3 ON participant');
        $this->addSql('DROP INDEX IDX_D79F6B1112469DE2 ON participant');
        $this->addSql('DROP INDEX IDX_D79F6B1133D1A3E7 ON participant');
        $this->addSql('ALTER TABLE participant DROP archer_id, DROP category_id, DROP tournament_id');
        $this->addSql('ALTER TABLE tournament DROP FOREIGN KEY FK_BD5FB8D9876C4DDA');
        $this->addSql('DROP INDEX IDX_BD5FB8D9876C4DDA ON tournament');
        $this->addSql('ALTER TABLE tournament DROP organizer_id');
    }
}
