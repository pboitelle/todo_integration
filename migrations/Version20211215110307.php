<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211215110307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE todo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE todo (id INT NOT NULL, relation_id INT NOT NULL, name VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A0EB6A03256915B ON todo (relation_id)');
        $this->addSql('COMMENT ON COLUMN todo.create_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE todo ADD CONSTRAINT FK_5A0EB6A03256915B FOREIGN KEY (relation_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE todo_id_seq CASCADE');
        $this->addSql('DROP TABLE todo');
    }
}
