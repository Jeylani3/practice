<?php
    include ("templates/header.php");
?>
        <div class="posts-list w-100 p-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width:15%">Publication Date</th>
                        <th style="width:15%">Title</th>
                        <th style="width:45%">Content</th>
                        <th style="width:25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    
                        include('../connect.php');

                        $sql = "SELECT * FROM posts";
                        $result = $conn->query($sql);
                        while  ($row = mysqli_fetch_array($result)) {
                           echo "<tr>";
                                echo "<td>". $row['date']. "</td>";
                                echo "<td>". $row['title']. "</td>";
                                echo "<td>". $row['content']. "</td>";
                                echo "<td>";
                                    echo "<a href='view.php?id=". $row['id'] . "' class='btn btn-info'>View</a>";
                                    echo "<a href='edit.php?id=". $row['id'] . "' class='btn btn-warning'>Edit</a>";
                                    echo "<a href='delete.php?id=". $row['id'] . " ' class='btn btn-danger'>Delete</a>";
                                echo "</td>";
                    
                        }
                    ?>
                   
                </tbody>
            </table>
        </div>
<?php
    include ("templates/footer.php");
?>