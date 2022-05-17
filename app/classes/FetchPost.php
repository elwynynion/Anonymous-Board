<?php

class FetchPost extends config {
    public function fetchPost()
    {
        $connect = $this->connect();
        $sql = "SELECT * FROM post WHERE post_visibility = 'yes' ORDER BY id DESC";
        $stmt = $connect->prepare($sql);
        // var_dump($stmt);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
           echo "
            <div class='p-5 bg-white card-post mb-3'>
                <h5 style='color:#B85C38;'>$result[username]</h5>
                <p>
                        $result[post_content]
                </p>
            </div>
           ";
            

        }
        
    }
}
?>
