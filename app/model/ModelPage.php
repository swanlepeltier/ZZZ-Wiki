<!-- ----- debut ModelPage -->

<?php
require_once 'Model.php';

class ModelPage
{
    private $id, $title, $content, $author_id, $created_at, $updated_at;

    // Constructeur
    public function __construct($id = NULL, $title = NULL, $content = NULL, $author_id = NULL, $created_at = NULL, $updated_at = NULL)
    {
        if (!is_null($id)) {
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->author_id = $author_id;
            $this->created_at = $created_at;
            $this->updated_at = $updated_at;
        }
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getAuthorId()
    {
        return $this->author_id;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    // Méthodes statiques
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from page order by id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPage");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getById($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from page where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $statement->setFetchMode(PDO::FETCH_CLASS, 'ModelPage');
            return $statement->fetch();
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return null;
        }
    }

    public static function insert($title, $content, $author_id)
    {
        try {
            $database = Model::getInstance();
            $query = "insert into page (title, content, author_id, created_at, updated_at) values (:title, :content, :author_id, NOW(), NOW())";
            $statement = $database->prepare($query);
            $statement->execute([
                'title' => $title,
                'content' => $content,
                'author_id' => $author_id
            ]);
            return $database->lastInsertId();
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update($id, $title, $content)
    {
        try {
            $database = Model::getInstance();
            $query = "update page set title = :title, content = :content, updated_at = NOW() where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'title' => $title,
                'content' => $content
            ]);
            return $statement->rowCount();
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function delete($id)
    {
        try {
            $database = Model::getInstance();
            $query = "delete from page where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            return $statement->rowCount();
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}
?>
<!-- ----- fin ModelPage -->