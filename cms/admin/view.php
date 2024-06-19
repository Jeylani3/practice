<?php
    include ("templates/header.php");
?>
            <div class="post w-100 bg-light p-5">
                <?php 
                    $id = $_GET['id'];
                    
                    if ($id) {
                        include("../connect.php");
                        $sql = "SELECT * FROM posts WHERE id = $id";
                        $result = $conn->query($sql);
                        while  ($row = mysqli_fetch_array($result)) {
                        ?> 
                            <h1><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
                            <p><?= htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p><?= nl2br(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8')); ?></p>
                             
                            <!-- echo "<h3>". $row['title']. "</h3>"; 
                            echo "<p>". $row['date']. "</p>";
                            echo "<p>". $row['content']. "</p>";
                             -->
                      <?php      
                        }
                    } else {
                        echo "<h2>No id found</h2>";
                    }
                ?>
            </div>
        
    include ("templates/footer.php");
?>