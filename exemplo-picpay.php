<?php
//  curl --location --request POST 'https://appws.picpay.com/ecommerce/public/payments/{referenceId}/cancellations' \
    // --header 'x-picpay-token: {sua_chave_de_integracao}' \
    // --header 'Content-Type: application/json' \
    // --data-raw '' -->

//  Iniciar cURL -->
$ch = curl_init();

//  URL de Requisição -->

curl_setopt($ch, CURLOPT_URL, 'https://appws.picpay.com/ecommerce/public/payments/{referenceId}/cancellations');

//  Parâmetro de Resposta -->
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//  Enviar o Parâmetro de resposta  -->

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);







?>

