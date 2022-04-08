<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220408141324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, photo_id INT NOT NULL, user VARCHAR(255) NOT NULL, content VARCHAR(1024) NOT NULL, date DATETIME NOT NULL, INDEX IDX_9474526C7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, album_id INT NOT NULL, reference VARCHAR(1024) NOT NULL, likes INT NOT NULL, dislikes INT NOT NULL, views INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(1024) NOT NULL, location VARCHAR(255) NOT NULL, INDEX IDX_14B784181137ABCF (album_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_tag (photo_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_8C2D8E577E9E4C8C (photo_id), INDEX IDX_8C2D8E57BAD26311 (tag_id), PRIMARY KEY(photo_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784181137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE photo_tag ADD CONSTRAINT FK_8C2D8E577E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_tag ADD CONSTRAINT FK_8C2D8E57BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784181137ABCF');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7E9E4C8C');
        $this->addSql('ALTER TABLE photo_tag DROP FOREIGN KEY FK_8C2D8E577E9E4C8C');
        $this->addSql('ALTER TABLE photo_tag DROP FOREIGN KEY FK_8C2D8E57BAD26311');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE photo_tag');
        $this->addSql('DROP TABLE tag');
    }
}
