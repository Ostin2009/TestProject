<?php

namespace App\GraphQL\Mutations;

use Closure;
use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Mutation;

class DeleteUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteUser'
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'id' => ['
                name' => 'id',
                'type' => Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, array $args)
    {
        $user = User::find($args['id']);
        if(!$user) {
            return null;
        }

        $deletedUser = $user->toArray();
        $user->delete();

        return $deletedUser;
    }
}
