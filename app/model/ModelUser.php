<!-- ----- debut ModelUser -->

<?php
require_once 'Model.php';

class ModelUser
{
    private $id, $username, $password, $email, $role;

    // Constructeur
    public function __construct($id = NULL, $username = NULL, $password = NULL, $email = NULL, $role = NULL)
    {
        if (!is_null($id)) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->role = $role;
        }
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getRole()
    {
        return $this->role;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }

    // Méthodes statiques
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from user order by id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUser");
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
            $query = "select * from user where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $statement->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            return $statement->fetch();
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return null;
        }
    }

    public static function insert($username, $password, $email, $role)
    {
        try {
            $database = Model::getInstance();
            $query = "insert into user value (:id, :username, :password, :email, :role)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => null, // Auto-increment
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'email' => $email,
                'role' => $role
            ]);
            return $database->lastInsertId();
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function checkLogin($username, $password)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from user where username = :username";
            $statement = $database->prepare($query);
            $statement->execute(['username' => $username]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return null;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return null;
        }
    }

    public static function update()
    {
        echo ("ModelUser : update() TODO ....");
        return null;
    }

    public static function delete()
    {
        echo ("ModelUser : delete() TODO ....");
        return null;
    }
}
?>
<!-- ----- fin ModelUser -->