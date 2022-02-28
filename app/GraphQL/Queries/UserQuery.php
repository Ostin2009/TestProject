<?php

namespace App\GraphQL\Queries;

use Closure;
use App\User;
use GraphQL\Error\Error;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;


class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {

        $user = User::query()->where('id' , $args['id'])->first();

        if(!$user) return new Error("user id = {$args['id']} not found");

        return $user;
    }
}


/*

На локальной машине развернуть тестовый проект для ознакомления и изучения технологий используемых в компании.

1. Установить на компьютер Docker https://docs.docker.com/desktop/windows/install/, почитать про базовые функции
что такое контейнеры, образы, как запускать останавливать

2. Создать локально ларавел проект версии laravel 5.7.28
установить пакет для работы с GraphQL rebing/graphql-laravel "^3.1" https://github.com/rebing/graphql-laravel
ознакомится с пакетом и graphql в целом

3. Создать локально отдельный проект vue.js версии 3
Для работы с graphql установить пакеты Apollo
   "apollo": "^2.33.6",
   "apollo-cache-inmemory": "^1.6.6",
   "apollo-client": "^2.6.10",
   "apollo-link": "^1.2.14",
   "apollo-link-batch-http": "^1.2.14",
   "apollo-link-context": "^1.0.20",
   "apollo-link-error": "^1.1.13",
   "graphql-tag": "^2.12.5"

почитать и ознакомиться с использованием apollo во vue

4. Для закрепления знаний создать в ларавел базу данных с фейковыми пользователями

Сделать graphql запросы на получение одного пользователя по id, получение списка пользователей с пагинацией
Сделать graphql мутации на создание пользователя, на удаление пользователя

Делаем все без авторизации

4. Для закрепления знаний на клиенте поставить пакет для внешнего оформления https://element-plus.org/en-US/
сделать соответствующие страницы для просмотра списка пользователей с пагинацией в виде таблицы
страница добавления пользователя страница редактирования пользователя возможность удаления
использовать vue-router для страниц
использовать элементы таблиц, кнопок и тд  из пакета element-plus

дизайн не важен, по своему усмотрению

*/
