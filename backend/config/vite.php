<?php

return [
    // Path to the Vite dev server hot file
    'hot_file' => storage_path('framework/vite.hot'),

    // Directory under public/ where Vite outputs builds
    'build_path' => env('VITE_BUILD_PATH', 'build'),

    // Absolute path to the Vite manifest used for production asset resolution
    'manifest' => public_path('build/.vite/manifest.json'),
];


