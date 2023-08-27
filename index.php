<?php
include_once './object/header.php';

include_once './connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon/favicon.ico">
    <title>Vitrine Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="display-4  mt-5 mb-5">Produtos</h1>
        <?php
        $query_products = "SELECT id, name, price, image FROM products ORDER BY id ASC";
        $result_products = $conn->prepare($query_products);
        $result_products->execute();
        ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php

            while ($row_product = $result_products->fetch(PDO::FETCH_ASSOC)) {
                extract($row_product);

                //     echo "<img src='./images/$id/$image'><br>";
                //     echo "ID: $id<br>";
                //     echo "Nome: $name<br>";
                //     echo "Preço: R$ " . number_format($price, 2, ",", ".")  . "<br>";
                // echo "<hr>";
            ?>
                <div class="col mb-4 text-center">
                    <div class="card h-100">
                        <img src='<?php echo "./images/products/$id/$image"; ?>' class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $name; ?></h5>
                            <p class="card-text">R$ <?php echo number_format($price, 2, ",", ".") ?> </p>

                            <a href="view_product.php?id=<?php echo $id; ?>" class="btn btn-primary">Detalhes</a>

                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>