<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 18,
                'title' => 'contact_show',
            ],
            [
                'id'    => 19,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 20,
                'title' => 'contact_access',
            ],
            [
                'id'    => 21,
                'title' => 'faq_create',
            ],
            [
                'id'    => 22,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 23,
                'title' => 'faq_show',
            ],
            [
                'id'    => 24,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 25,
                'title' => 'faq_access',
            ],
            [
                'id'    => 26,
                'title' => 'blog_create',
            ],
            [
                'id'    => 27,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 28,
                'title' => 'blog_show',
            ],
            [
                'id'    => 29,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 30,
                'title' => 'blog_access',
            ],
            [
                'id'    => 31,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 32,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 33,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 34,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 35,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 36,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 37,
                'title' => 'property_access',
            ],
            [
                'id'    => 38,
                'title' => 'sale_create',
            ],
            [
                'id'    => 39,
                'title' => 'sale_edit',
            ],
            [
                'id'    => 40,
                'title' => 'sale_show',
            ],
            [
                'id'    => 41,
                'title' => 'sale_delete',
            ],
            [
                'id'    => 42,
                'title' => 'sale_access',
            ],
            [
                'id'    => 43,
                'title' => 'for_rent_create',
            ],
            [
                'id'    => 44,
                'title' => 'for_rent_edit',
            ],
            [
                'id'    => 45,
                'title' => 'for_rent_show',
            ],
            [
                'id'    => 46,
                'title' => 'for_rent_delete',
            ],
            [
                'id'    => 47,
                'title' => 'for_rent_access',
            ],
            [
                'id'    => 48,
                'title' => 'property_type_create',
            ],
            [
                'id'    => 49,
                'title' => 'property_type_edit',
            ],
            [
                'id'    => 50,
                'title' => 'property_type_show',
            ],
            [
                'id'    => 51,
                'title' => 'property_type_delete',
            ],
            [
                'id'    => 52,
                'title' => 'property_type_access',
            ],
            [
                'id'    => 53,
                'title' => 'amenity_create',
            ],
            [
                'id'    => 54,
                'title' => 'amenity_edit',
            ],
            [
                'id'    => 55,
                'title' => 'amenity_show',
            ],
            [
                'id'    => 56,
                'title' => 'amenity_delete',
            ],
            [
                'id'    => 57,
                'title' => 'amenity_access',
            ],
            [
                'id'    => 58,
                'title' => 'new_project_create',
            ],
            [
                'id'    => 59,
                'title' => 'new_project_edit',
            ],
            [
                'id'    => 60,
                'title' => 'new_project_show',
            ],
            [
                'id'    => 61,
                'title' => 'new_project_delete',
            ],
            [
                'id'    => 62,
                'title' => 'new_project_access',
            ],
            [
                'id'    => 63,
                'title' => 'team_create',
            ],
            [
                'id'    => 64,
                'title' => 'team_edit',
            ],
            [
                'id'    => 65,
                'title' => 'team_show',
            ],
            [
                'id'    => 66,
                'title' => 'team_delete',
            ],
            [
                'id'    => 67,
                'title' => 'team_access',
            ],
            [
                'id'    => 68,
                'title' => 'our_service_create',
            ],
            [
                'id'    => 69,
                'title' => 'our_service_edit',
            ],
            [
                'id'    => 70,
                'title' => 'our_service_show',
            ],
            [
                'id'    => 71,
                'title' => 'our_service_delete',
            ],
            [
                'id'    => 72,
                'title' => 'our_service_access',
            ],
            [
                'id'    => 73,
                'title' => 'viewing_create',
            ],
            [
                'id'    => 74,
                'title' => 'viewing_edit',
            ],
            [
                'id'    => 75,
                'title' => 'viewing_show',
            ],
            [
                'id'    => 76,
                'title' => 'viewing_delete',
            ],
            [
                'id'    => 77,
                'title' => 'viewing_access',
            ],
            [
                'id'    => 78,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
