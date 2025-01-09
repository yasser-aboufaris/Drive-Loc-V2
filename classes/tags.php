<?php
class Tags {
private $pdo;
    
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    

    public  function addPostTags($pdo, $post_id, $tag_ids) {
        $query = "INSERT INTO post_tags (id_post, id_tag) VALUES (:post_id, :tag_id)";
        $stmt = $pdo->prepare($query);
        
        // Loop through the indexed array
        foreach ($tag_ids as $id => $value) {
            $stmt->bindParam(":post_id", $post_id);
            $stmt->bindParam(":tag_id", $id);
            $stmt->execute();
        }
    
    
    
}}