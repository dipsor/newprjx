<?php

namespace App\Users\Transformers;

use League\Fractal\TransformerAbstract;
use App\Users\Models\User;

/**
 * Class UserTransformer
 * @package TechUp\Transformers
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            'id'                    => (string) $user->id,
            'email'                 => (string) $user->email,
            'name'                  => (string) $user->name,
            'roles'                 => $user->roles,
            'first_name'            => (string) $user->first_name2,
            'last_name'             => (string) $user->last_name,
            'phone_number'          => (string) $user->phone_number,
            'city'                  => (string) $user->city,
            'street'                => (string) $user->street,
            'postal_code'           => (string) $user->postal_code,
            'country_code'          => (string) $user->country_code,
            'created_at'            => (string) $user->created_at,
            'updated_at'            => (string) $user->updated_at,
            'deleted_at'            => (string) $user->deleted_at,
//            'links'   => [
//                [
//                    'rel' => 'self',
//                    'uri' => '/api/v2/users/' . Tiny::to($user->id),
//                ]
//            ],
        ];
    }
}