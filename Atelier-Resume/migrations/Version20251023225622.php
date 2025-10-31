<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251023225622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EA000B10');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EA000B10 FOREIGN KEY (class_id) REFERENCES classroom (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EA000B10');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EA000B10 FOREIGN KEY (class_id) REFERENCES classroom (id)');
    }
}
