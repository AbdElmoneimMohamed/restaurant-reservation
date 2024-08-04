<?php

declare(strict_types=1);

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'L5 Swagger UI',
            ],

            'routes' => [
                /*
                 * Route for accessing api documentation interface
                */
                'api' => 'api/documentation',
            ],
            'paths' => [
                'docs' => resource_path('docs'),
                /*
                 * Edit to include full URL in ui for assets
                */
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),

                /*
                 * File name of the generated YAML documentation file
                */
                'docs_yaml' => 'swagger.yaml',

                /*
                * Set this to `json` or `yaml` to determine which documentation file to use in UI
                */
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'yaml'),

                /*
                 * Absolute paths to directory containing the swagger annotations are stored.
                */
                'annotations' => [
                    base_path('app'),
                ],
            ],
        ],
    ],
];
