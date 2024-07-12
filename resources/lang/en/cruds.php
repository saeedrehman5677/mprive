<?php

return [
    'userManagement' => [
        'title'          => 'User ',
        'title_singular' => 'User ',
    ],
    'developer' => [
        'title'          => 'Developers',
        'title_singular' => 'Developer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
        ],
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'profile'                  => 'Profile',
            'profile_helper'           => ' ',
            'phone'                    => 'Phone',
            'phone_helper'             => ' ',
        ],
    ],
    'contact' => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'full_name'         => 'Full Name',
            'full_name_helper'  => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'property'          => 'Property',
            'property_helper'   => ' ',
        ],
    ],
    'faq' => [
        'title'          => 'Faq',
        'title_singular' => 'Faq',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'category'           => 'Category',
            'category_helper'    => ' ',
        ],
    ],
    'blog' => [
        'title'          => 'Blogs',
        'title_singular' => 'Blog',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'meta_title'              => 'Meta Title',
            'meta_title_helper'       => ' ',
            'meta_content'            => 'Meta Content',
            'meta_content_helper'     => ' ',
            'meta_description'        => 'Meta Description',
            'meta_description_helper' => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'featured_image'          => 'Featured Image',
            'featured_image_helper'   => ' ',
            'description'             => 'Description',
            'description_helper'      => ' ',
            'slug'                    => 'Slug',
            'slug_helper'             => ' ',
            'detail_images'           => 'More Images',
            'detail_images_helper'    => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'excerpt'                 => 'Excerpt',
            'excerpt_helper'          => ' ',
            'status'                  => 'Status',
            'status_helper'           => ' ',
        ],
    ],
    'faqCategory' => [
        'title'          => 'Faqs Category',
        'title_singular' => 'Faqs Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqManagement' => [
        'title'          => 'Faq ',
        'title_singular' => 'Faq ',
    ],
    'property' => [
        'title'          => 'Properties ',
        'title_singular' => 'Properties',
    ],
    'sale' => [
        'title'          => 'Properties',
        'title_singular' => 'Properties',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'sub_title'                => 'Sub Title',
            'sub_title_helper'         => ' ',
            'location'                 => 'Location',
            'location_helper'          => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'size'                     => 'Size in sq feet',
            'size_helper'              => ' ',
            'price'                    => 'Cost (per month or total)',
            'price_helper'             => ' ',
            'bathrooms'                => 'No bathrooms',
            'bathrooms_helper'         => ' ',
            'bed_rooms'                => 'No bed rooms',
            'bed_rooms_helper'         => ' ',
            'year_built'               => 'Year Built',
            'year_built_helper'        => ' ',
            'developer'                => 'Developer',
            'developer_helper'         => ' ',
            'property_status'          => 'Property Status',
            'property_status_helper'   => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'publishing_status'        => 'Publishing Status',
            'publishing_status_helper' => ' ',
            'featured_image'           => 'Featured Image',
            'featured_image_helper'    => ' ',
            'gallery_images'           => 'Images Gallery (multiple)',
            'gallery_images_helper'    => ' ',
            'property'                 => 'Property id (Ref id)',
            'property_helper'          => ' ',
            'slug'                     => 'Slug',
            'slug_helper'              => ' ',
            'files'                    => 'Property Files',
            'files_helper'             => ' ',
            'discounted_price'         => 'Cost (if reduced)',
            'discounted_price_helper'  => ' ',
            'property_type'            => 'Property Type',
            'property_type_helper'     => ' ',
            'amenities'                => 'Amenities',
            'amenities_helper'         => ' ',
            'nearby'                   => 'Nearby',
            'nearby_helper'            => ' ',
            'featured'                 => 'Flag Featured',
            'featured_helper'          => 'show in featured properties',
            'user'                     => 'Seller (optional)',
            'user_helper'              => ' ',
            'emirates'                 => 'Emirates',
            'emirates_helper'          => 'emirates the property is in helps in search',
            'top_properties'           => 'TOP PROPERTIES',
            'top_properties_helper'    => 'show inside the top Properties',
            'meta_title'               => 'Meta Title',
            'meta_title_helper'        => ' ',
            'meta_content'             => 'Meta Content',
            'meta_content_helper'      => ' ',
            'meta_description'         => 'Meta Description',
            'meta_description_helper'  => ' ',
        ],
    ],
    'forRent' => [
        'title'          => 'For Rent',
        'title_singular' => 'For Rent',
    ],
    'propertyType' => [
        'title'          => 'Property Types',
        'title_singular' => 'Property Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'icon'              => 'Icon',
            'icon_helper'       => ' ',
        ],
    ],
    'amenity' => [
        'title'          => 'Amenities',
        'title_singular' => 'Amenity',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'icon'              => 'Icon',
            'icon_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'newProject' => [
        'title'          => 'New Project',
        'title_singular' => 'New Project',
    ],
    'team' => [
        'title'          => 'Team',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'job_title'             => 'Job Title',
            'job_title_helper'      => 'job title of person',
            'phone'                 => 'Phone',
            'phone_helper'          => ' ',
            'facebook'              => 'facebook',
            'facebook_helper'       => ' ',
            'instagram'             => 'Instagram',
            'instagram_helper'      => ' ',
            'twitter'               => 'Twitter',
            'twitter_helper'        => ' ',
            'linkedin'              => 'Linkedin',
            'linkedin_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'ourService' => [
        'title'          => 'Our Services',
        'title_singular' => 'Our Service',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'icon'               => 'Icon',
            'icon_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'viewing' => [
        'title'          => 'Viewings',
        'title_singular' => 'Viewing',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'date'              => 'Viewing Date',
            'date_helper'       => ' ',
            'time'              => 'Viewing Time',
            'time_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'property'          => 'Property',
            'property_helper'   => ' ',
        ],
    ],

];
