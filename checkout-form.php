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
    <title>Formulário de checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php 
    include_once './object/header.php';
    $query_products = "SELECT id, name, price FROM products WHERE id =:id LIMIT 1";
    $result_products = $conn->prepare($query_products);
    $result_products->bindParam(':id', $id, PDO::PARAM_INT);
    $result_products->execute();
    $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
    extract($row_product);
    ?>

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="./images/logo/logo-quad.jpg" alt="Logo" width="100" height="100">
            <h2>Formulário de Pagamento</h2>
            <p class="lead">A Shanti agradece a preferência !!</p>
        </div>
        <div class="row mb-5">
            <div class="col-md-8">
                <h3><?php echo $name; ?></h3>

            </div>
            <div class="col-md-4">
                <div class="mb-1 text-muted">
                    <?php echo number_format($price, 2, ",", ".") ?>
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Informações Pessoais</h4>

                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Primeiro nome</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Sobrenome</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" placeholder="Somente números" maxlength="14"  oninput="maskCPF(this)"required>
                            <div class="invalid-feedback">
                                Valid CPF is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="phone" placeholder="(DDD) 9XXXX-XXXX"maxlength="14"  oninput="maskPhone(this)"required>
                            <div class="invalid-feedback">
                                Valid CPF is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Enviar</button>
        
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="./js/custom.js"></script>
</body>

</html>