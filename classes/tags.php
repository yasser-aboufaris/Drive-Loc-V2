<?php
class Tags {
private $pdo;
    
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    

    public function addPostTags($post_id, $tag_ids) {
        $query = "INSERT INTO post_tags (id_post, id_tag) VALUES (:post_id, :tag_id)";
        $stmt = $this->pdo->prepare($query);
    
        foreach ($tag_ids as $id) {
            $stmt->bindParam(":post_id", $post_id);
            $stmt->bindParam(":tag_id", $id);
            $stmt->execute();
        }
    }
    
    public  function read() {
        $query = "select * from tags";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function deleteTag($id_tag) {
        $query = "DELETE FROM tags WHERE id_tag = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":tag_id", $id_tag);
        $stmt->execute();
    }


    function updateTag($tag_name,$id_tag) {
        $query = "UPDATE tags SET tag_name = ? WHERE id_tag = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":tag_name",);
    }

    


}