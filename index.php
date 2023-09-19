<?php 
    function response($code, $ok, $msg){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Content-Type: application/json');

        http_response_code($code);
        echo (json_encode([
            'ok' => $ok,
            'msg' => $msg
        ]));

        die;
    }

    if(!$_SERVER['REQUEST_METHOD'] == 'POST');

    $conexao = new PDO('mysql:host=localhost;dbname=lojinha', 'root', 'root');

    $body = file_get_contents('php://input');

    if(!$body)
        response(400, false, "corpo da requisição não encontrado");

    $body = json_decode($body);

    $body->name_product = filter_var($body->name_product, FILTER_UNSAFE_RAW);
    $body->category = filter_var($body->category, FILTER_UNSAFE_RAW);
    $body->price = filter_var($body->price, FILTER_SANITIZE_NUMBER_FLOAT);
    $body->description_product = filter_var($body->description_product, FILTER_UNSAFE_RAW);

    if(!$body->name_product || !$body->email || !$body->price || !$body->description_product)
        response(400, false, "Dados Inválidos");

    $stm = $conexao->prepare('INSERT INTO products (name_product, category, price, description_product) VALUES (:name_product, :category, :price, :description_product');

    $stm->bindParam('name_product', $$body->name_product);
    $stm->bindParam('category', $$body->category);
    $stm->bindParam('price', $$body->price);
    $stm->bindParam('description_product', $$body->description_product);

    $stm->execute();

    response(200, true, 'Produto cadastrado com sucesso.');
?>