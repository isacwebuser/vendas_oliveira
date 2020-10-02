<?php
require __DIR__ . '/vendor/autoload.php';


$app = AppFactory::create();

$app->get('/', function (){
    $saida = json_encode(
        array(
            'data' => date('d/m/y H:i:s')
        )
    );
    return $saida;
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();