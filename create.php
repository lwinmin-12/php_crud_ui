<?php require_once "./template/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="border rounded p-5 m-5">
            <h3>create list</h3>
            <?php 
            
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $name = $_POST['name'];
                $money =$_POST['money'];


                $sql = "INSERT INTO people (name , money) VALUES ('$name' , $money)";

                if(mysqli_query($con , $sql)){
                    echo alert('Added Data');
                }else{
                    echo alert("adding fail" ,"danger");
                }

            }
            
            
            ?>
            <form action="" method="post">
                <div>
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div>
                    <label for="" class="form-label">money</label>
                    <input type="text" name="money" class="form-control" required>
                </div>
                <button class="btn btn-primary mt-3">submit</button>
            </form>
            </div>
           
        </div>
    </div>
</div>
<?php require_once "./template/footer.php" ?>