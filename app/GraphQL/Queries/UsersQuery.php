<?php

namespace App\GraphQL\Queries;

use Closure;
use App\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'users',
    ];

    public function type(): Type
    {
        return GraphQL::type('UserList');
    }

    public function args(): array
    {
        return [
            'size' => [
                'type' => Type::int(),
                'defaultValue' => 10,
            ],
            'page' => [
                'type' => Type::int(),
                'defaultValue' => 1,
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {

        $query = User::query()->paginate($args['size'], ['*'], 'page', $args['page']);
        $result = $query->items();
        return [
            'page' => $query->currentPage(),
            'size' => $query->perPage(),
            'count' => $query->total(),
            'pages' => $query->lastPage(),
            'items' => $result
            ];
        //User::paginate(10);
    }
}
