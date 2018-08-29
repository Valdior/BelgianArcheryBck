<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180624093911 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE affiliate ADD club_id INT NOT NULL, ADD archer_id INT NOT NULL');
        $this->addSql('ALTER TABLE affiliate ADD CONSTRAINT FK_597AA5CF61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE affiliate ADD CONSTRAINT FK_597AA5CF147940E3 FOREIGN KEY (archer_id) REFERENCES archer (id)');
        $this->addSql('CREATE INDEX IDX_597AA5CF61190A32 ON affiliate (club_id)');
        $this->addSql('CREATE INDEX IDX_597AA5CF147940E3 ON affiliate (archer_id)');
        $this->addSql('ALTER TABLE club ADD region_id INT DEFAULT NULL, DROP league');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387298260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_B8EE387298260155 ON club (region_id)');
        $this->addSql('ALTER TABLE region ADD league_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F17658AFC4DE FOREIGN KEY (league_id) REFERENCES league (id)');
        $this->addSql('CREATE INDEX IDX_F62F17658AFC4DE ON region (league_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE affiliate DROP FOREIGN KEY FK_597AA5CF61190A32');
        $this->addSql('ALTER TABLE affiliate DROP FOREIGN KEY FK_597AA5CF147940E3');
        $this->addSql('DROP INDEX IDX_597AA5CF61190A32 ON affiliate');
        $this->addSql('DROP INDEX IDX_597AA5CF147940E3 ON affiliate');
        $this->addSql('ALTER TABLE affiliate DROP club_id, DROP archer_id');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE387298260155');
        $this->addSql('DROP INDEX IDX_B8EE387298260155 ON club');
        $this->addSql('ALTER TABLE club ADD league INT NOT NULL, DROP region_id');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F17658AFC4DE');
        $this->addSql('DROP INDEX IDX_F62F17658AFC4DE ON region');
        $this->addSql('ALTER TABLE region DROP league_id');
    }
}
