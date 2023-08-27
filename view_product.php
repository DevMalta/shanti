<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
include_once './connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon/favicon.ico">
    <title>Visualizar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php
        include_once './object/header.php';
        $query_products = "SELECT id, name, description, price, image FROM products WHERE id =:id LIMIT 1";
        $result_products = $conn->prepare($query_products);
        $result_products->bindParam(':id', $id, PDO::PARAM_INT);
        $result_products->execute();
        $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
        extract($row_product);
        $price_rise = ($price * 0.50) + $price;
    ?>
    <div class="container">
        <h1 class="display-4 mt-5 mb-5"><?php echo $name; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img src='<?php echo "./images/products/$id/$image";?>' class="card-img-top">
            </div>
            <div class="col-md-6">
                <p>de R$ <?php echo number_format($price_rise, 2, ",", ".")?></br>
                <hr>
                <p>por R$ <?php echo number_format($price, 2, ",", ".")?></p>
                <p>
                    <a href="checkout-form.php?id=<?php echo $id; ?>" class="btn btn-primary">Comprar</a>
                </p>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <?php echo $description; ?>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>