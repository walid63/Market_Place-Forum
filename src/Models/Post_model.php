<?php

require_once "./src/Server/_connect.php";
require_once "./src/Entity/Post.php";

class Post_model
{
    private $db;

    public function __construct()
    {
        $this->db = _connect::getInstance()->getConnection();
    }

    public function getAllPost()
    {
        $query = "SELECT * FROM post";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $posts = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setCreated_at($row['created_at']);
            $post->setCount_like($row['count_like']);
            $post->setSlug($row['slug']);
            $post->setImage($row['image']);
            $post->setAuthor_id($row['author_id']);

            $posts[] = $post;
        }

        return $posts;
    }

    public function createPost(Post $post)
    {
        $query = "INSERT INTO post (title, content, created_at, count_like, slug, image, author_id) 
                  VALUES (:title, :content, :created_at, :count_like, :slug, :image, :author_id)";

        $statement = $this->db->prepare($query);

        $statement->execute([
            'title' => $post->getTitle(),
            'content' => $post->getContent(),
            'created_at' => $post->getCreated_at(),
            'count_like' => $post->getCount_like(),
            'slug' => $post->getSlug(),
            'image' => $post->getImage(),
            'author_id' => $post->getAuthor_id()
        ]);

        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //                                                                                                                                  // get post by id

    public function getPostById($postId)
    {
        $query = "SELECT * FROM posts WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$postId]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setCreated_at($row['created_at']);

            return $post;
        } else {
            return null;
        }
    }

    //                                                                                                                                  //update post

    public function updatePost(Post $post)
    {
        // Préparer la requête SQL pour mettre à jour le post
        $query = "UPDATE posts SET content = :content WHERE id = :id";

        // Préparer les valeurs à lier aux paramètres de la requête
        $params = [
            'id' => $post->getId(),
            'content' => $post->getContent()
        ];

        // Exécuter la requête préparée avec les paramètres
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        // Vérifier si la mise à jour a été effectuée avec succès
        if ($stmt->rowCount() > 0) {
            return true; // La mise à jour a réussi
        } else {
            return false; // La mise à jour a échoué
        }
    }

    //                                                                                                                                  //delete post

    public function deletePost($postId)
    {
        $query = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$postId]);

        return $stmt->rowCount() > 0;
    }

  /*  public function getPostBySlug($slug)
    {
        $query = "SELECT * FROM post WHERE slug = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$slug]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $post = new Post();
            // Remplir les propriétés du post à partir des valeurs de la base de données
            // ...
            return $post;
        } else {
            return null;
        }
    }*/

    public function getPostBySlug($slug)
    {
        $query = "SELECT * FROM posts WHERE slug = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$slug]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setCreated_at($row['created_at']);
            $post->setCount_like($row['count_like']);
            $post->setSlug($row['slug']);
            $post->setImage($row['image']);
            $post->setAuthor_id($row['author_id']);

            return $post;
        } else {
            return null;
        }
    }


    public function getUserByPost($authorId)
    {
        $query = "SELECT * FROM User WHERE id = :author_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['author_id' => $authorId]);

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            // Utilisez le constructeur de la classe User pour créer un nouvel objet User
            $user = new User(
                $userData['firstname'],
                $userData['lastname'],
                $userData['username'],
                $userData['email'],
                $userData['password'],
                $userData['tel'],
                $userData['address'],
                $userData['ville'],
                $userData['code_postal'],
                $userData['roles'],
                $userData['createdAt']
            );

            // Si votre classe User a d'autres propriétés, ajoutez les setters correspondants ici.

            return $user;
        }

        return null; // Retourne null si l'utilisateur n'est pas trouvé.
    }


}
