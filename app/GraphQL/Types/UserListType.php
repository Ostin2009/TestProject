<?php

namespace App\GraphQL\Types;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserListType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'UserList',
        'description'   => 'A list of users',
    ];

    public function fields(): array
    {
        return [
            'items' => [
                'type' => Type::listOf(GraphQL::type('User'))
                    ],
            'page' => [
                'type' => Type::int()
            ],
            'size' => [
                'type' => Type::int()
            ],
            'count' => [
                'type' => Type::int()
            ],
            'pages' => [
                'type' => Type::int()
            ],
        ];
    }
}
