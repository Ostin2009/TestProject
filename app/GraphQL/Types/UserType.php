<?php

namespace App\GraphQL\Types;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'User',
        'description'   => 'A user',
        // Note: only necessary if you use `SelectFields`
        'model'         => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the user',
                // Use 'alias', if the database column is different from the type name.
                // This is supported for discrete values as well as relations.
                // - you can also use `DB::raw()` to solve more complex issues
                // - or a callback returning the value (string or `DB::raw()` result)
                //'alias' => 'user_id',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => ''
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of user',
                'resolve' => function($root, array $args) {
                    // If you want to resolve the field yourself,
                    // it can be done here
                    return strtolower($root->email);
                }
            ],
        ];
    }
}