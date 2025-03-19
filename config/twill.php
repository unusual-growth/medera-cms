<?php
return [
    'enabled' => [
        'dashboard' => true,
    ],
    // 'auto_seed_singletons' => false,
    'block_editor' => [
        'files' => ['file', 'video'],
        'use_twill_blocks' => [],
        'crops' => [
            'social-media-icon' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1,
                    ],
                ],
            ],
            'social-media-icon-dark' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1,
                    ],
                ],
            ],
            'logo' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
            'footer-logo' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
            'favicon' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
        ]
    ],
    'glide' => [
        'add_params_to_svgs' => false,
        'original_media_for_extensions' => ['svg'],
        'default_params' => [],
    ],
    'crops' => [
            'highlight' => [
                'desktop' => [
                    [
                        'name' => 'desktop',
                        'ratio' => 16 / 9,
                    ],
                ],
                'mobile' => [
                    [
                        'name' => 'mobile',
                        'ratio' => 1,
                    ],
                ],
            ],

            'social-media-icon' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1,
                    ],
                ],
            ],
            'social-media-icon-dark' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1,
                    ],
                ],
            ],
        ],
    'settings' => [
        'files' => ['file', 'video'],
        'crops' => [
            'logo' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
            'favicon' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
            'social-media-icon' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1,
                    ],
                ],
            ],
            'social-media-icon-dark' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1,
                    ],
                ],
            ],
            'default_social_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1.91 / 1,
                        'minValues' => [
                            'width' => 1200,
                            'height' => 627,
                        ],
                    ],
                ],
            ],
            'main' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1,
                    ],
                ],
            ],
        ],
    ],

    'media_library' => [
        'disk' => 'twill_media_library',
        'endpoint_type' => env('MEDIA_LIBRARY_ENDPOINT_TYPE', 's3'),
        'cascade_delete' => env('MEDIA_LIBRARY_CASCADE_DELETE', false),
        'local_path' => env('MEDIA_LIBRARY_LOCAL_PATH', 'uploads'),
        'image_service' => env('MEDIA_LIBRARY_IMAGE_SERVICE', 'A17\Twill\Services\MediaLibrary\Glide'),
        'acl' => env('MEDIA_LIBRARY_ACL', 'private'),
        'filesize_limit' => env('MEDIA_LIBRARY_FILESIZE_LIMIT', 50),
        'allowed_extensions' => ['svg', 'jpg', 'gif', 'png', 'jpeg', 'webp'],
        'init_alt_text_from_filename' => true,
        'prefix_uuid_with_local_path' => config('twill.file_library.prefix_uuid_with_local_path', false),
        'translated_form_fields' => false,

    ],
    'file_library' => [
        'filesize_limit' => env('FILE_LIBRARY_FILESIZE_LIMIT', 50),
        'allowed_extensions' => ['pdf', 'mov', 'mp4', 'webm', 'xml', 'xlsx'],
    ],
    'available_user_locales'    => [
        'en'
    ],
    'dashboard' => [
        'modules' => [


        ],
    ],
];
