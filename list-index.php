<?php require_once "./template/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="border rounded p-5 m-5">
            <?php 
                session_start();

            
            if(!empty($_SESSION['status'])){
                echo alert($_SESSION['status']['message']);
                $_SESSION['status'] = null;
            }

            ?>
            <h3 >အကြွေးပေးရမည့် လူများ</h3>

            <?php 
            
            $sql = "SELECT * FROM people";
            if(isset($_GET['q'])){
                $q = $_GET['q'];
                $sql .= " WHERE name LIKE '%$q%'";
            }
            $query = mysqli_query($con , $sql);
            
            $totalSql = "SELECT SUM(money) as total FROM people" ;
            $totalQuery = mysqli_query( $con,$totalSql);
            
            

            ?>

            <div class="my-3 d-flex justify-content-between">
                <p class="text-primary">total( <?= $query -> num_rows ?> )</p>
                <form action="" >
                    <div class="input-group">
                        <input name="q" class="form-control" value="<?php if(isset($_GET['q'])) : ?> <?= $_GET['q'] ?>  <?php endif; ?>" type="text">
                            <?php if(isset($_GET['q'])) : ?>
                                <a href="./list-index.php" class="btn btn-outline-danger"><i class="bi bi-x"></i></a>
                                <?php endif; ?>
                        <button class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>

            <table class="table  table-bordered table-striped table-hover">
                <thead class="text-center">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th class="text-end" scope="col ">money</th>
                    <th scope="col">created_at</th>
                    <th scope="col">controls</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query as $ea): ?>
                    <tr class="text-center">
                    <th scope="row"><?= $ea['id'] ?></th>
                    <td><?=$ea['name'] ?></td>
                    <td class="text-end"><?=$ea['money'] ?></td>
                    <td >
                        <p class="p-0 m-0 mt-1 ">
                        <i class="bi bi-calendar"></i>
                        <?= showDateTime($ea['created_at'])?>
                        </p >
                        <p class="p-0 m-0 mt-1 ">
                        <i class="bi bi-clock"></i>
                        <?= showDateTime($ea['created_at'], "h : i : s")?>
                        </p >
                    </td>
                    <td >
                        <a class="btn btn-outline-primary" href="update.php?id=<?= $ea['id'] ?>">
                        <i class="bi bi-pencil-square mx-2"></i>
                        </a>
                        <form class="d-inline-block" action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $ea['id']?>">
                        <button class="btn btn-outline-danger" onclick="return confirm('Are sure to delete')">
                        <i class="bi bi-trash  mx-2"></i>
                        </button>
                        </form>
                        
                    </td>
                    </tr>
                    <!-- <pre>
                    </pre> -->
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">total</td>
                        <td class="text-end">
                            <?= mysqli_fetch_assoc($totalQuery)['total'] ?>
                        </td>

                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
</div>
<?php require_once "./template/footer.php" ?>