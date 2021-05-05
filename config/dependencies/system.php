<?php


return [
    'UserManager' => function (\Psr\Container\ContainerInterface $c) {
        return new \App\Classes\Services\UserManager($c->get('DB'));
    },
    'Mailer' => DI\factory(function() {
        return new \App\Classes\Libs\Mailer();
    }),
    'ProductService' => DI\factory(function() {
        return new \App\Classes\Services\ProductService();
    }),
    'DB' => DI\factory(function() {
        return new \App\Classes\Libs\Db();
    }),
];