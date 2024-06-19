<?php
    include ("templates/header.php");
?>
       
       <div class="creat-form w-100 mx-auto p-4 bg-secondary m-4 rounded-4" style="max-width: 700px">
            <form action="process.php" method="post">
                <div class="form-group mb-4">
                    <label for="title" class="mb-2 text-light">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                </div>
                <div class="form-group mb-4">
                    <label for="content" class="mb-2 text-light">Content</label>
                    <textarea name="content" class="form-control" id="content" name="content" rows="3" placeholder="Enter content"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="content">Date</label>
                    <input type="hidden" name="date" value="<?php echo date('Y/m/d'); ?>" >
                </div>
                
                <div class="form-group mb-4">
                    <input type="submit" name="create" id="submit" value="Submit">
                </div>
            </form>   
        </div>
<?php
    include ("templates/footer.php");
?>    