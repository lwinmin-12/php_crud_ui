<?php require_once "./template/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="border rounded p-5 m-5">
            <h3>update list</h3>
            <?php 
            
            if($_SERVER['REQUEST_METHOD'] === "GET"){
                $id = $_GET['id'];


                $sql = "SELECT * FROM people WHERE id = $id";
                $query  = mysqli_query($con , $sql);
                $row = mysqli_fetch_assoc($query);

            }
            
            
            ?>
            <form action="update-info.php" method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div>
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" required>
                </div>
                <div>
                    <label for="" class="form-label">money</label>
                    <input type="text" name="money" value="<?= $row['money'] ?>" class="form-control" required>
                </div>
                <button class="btn btn-primary mt-3">update</button>
            </form>
            </div>
           
        </div>
    </div>
</div>
<?php require_once "./template/footer.php" ?>