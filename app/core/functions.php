<?php
session_start();
function InsertPost() {
    if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["vercode"]==$_POST["captcha"]){
        // URL ID 
        function postURLID($length) {
            $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }
            return $random;
        }

        // Random 4 digit number
        $rand_number_id = rand(1000, 9999);

        // Limit username to 10 characters
        function limitUsername($str) {
            if (strlen($str) > 10)
            $str = substr($str, 0, 10);
            return $str;
        }

        if (isset($_POST['submit'])) {
            $username = limitUsername($_POST['username']) . '#' . $rand_number_id;
            $_SESSION['username'] = limitUsername($_POST['username']);
            $post_content = $_POST['post_content'];
            $post_url = postURLID(6);

            $insert = new InsertPost($username, $post_content, $post_url);
            $insert->insertPost();

            echo "Post has been inserted";
            Header("Location: /");
        }
    } else {
        echo "
        <div class='p-3 bg-error' id='error-state'>
            <span>Wrong captcha</span>
            <span class='float-end'><button type='button' class='btn-close btn-close-white' aria-label='Close' onclick='error_close()'></button></span>
        </div>
        ";   
    }
}
?>
