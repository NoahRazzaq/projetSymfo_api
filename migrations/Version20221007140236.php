<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007140236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, genre_id INT NOT NULL, title VARCHAR(255) NOT NULL, duration INT NOT NULL, production_year INT NOT NULL, synopsis LONGTEXT NOT NULL, INDEX IDX_1D5EF26F4296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_actors (movie_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_26EC6D908F93B6FC (movie_id), INDEX IDX_26EC6D90217BBB47 (person_id), PRIMARY KEY(movie_id, person_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_directors (movie_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_3578A4C28F93B6FC (movie_id), INDEX IDX_3578A4C2217BBB47 (person_id), PRIMARY KEY(movie_id, person_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE movie_actors ADD CONSTRAINT FK_26EC6D908F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_actors ADD CONSTRAINT FK_26EC6D90217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_directors ADD CONSTRAINT FK_3578A4C28F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_directors ADD CONSTRAINT FK_3578A4C2217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F4296D31F');
        $this->addSql('ALTER TABLE movie_actors DROP FOREIGN KEY FK_26EC6D908F93B6FC');
        $this->addSql('ALTER TABLE movie_actors DROP FOREIGN KEY FK_26EC6D90217BBB47');
        $this->addSql('ALTER TABLE movie_directors DROP FOREIGN KEY FK_3578A4C28F93B6FC');
        $this->addSql('ALTER TABLE movie_directors DROP FOREIGN KEY FK_3578A4C2217BBB47');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_actors');
        $this->addSql('DROP TABLE movie_directors');
        $this->addSql('DROP TABLE person');
    }
}
