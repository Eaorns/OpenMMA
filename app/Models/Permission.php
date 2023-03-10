<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    public static $base_permissions = [
        'create_event',
        'edit_event',
        'publish_event',
        'delete_event',
        
        'view_registrations',
        'manage_registrations',
        'view_statistics',

        'enable_page',
        'manage_page',
        
        'assign_role',
        'create_role',
        'edit_role',
        'delete_role',
    ];
    public static $general_permissions = [
        'create_group',
        'assign_group',
        'delete_group',

        'view_users',
        'manage_users',
    ];

    public static function createPermissionsForGroup($group)
    {
        array_map(
            fn($perm) => Permission::create(['name' => $group . '.' . $perm]),
            Permission::$base_permissions
        );
    }
}
