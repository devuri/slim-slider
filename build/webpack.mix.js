let mix = require('laravel-mix')

mix.setPublicPath('build').version()

mix.options({ manifest: false })

// build the plugin files in trunk.
mix.copy('assets', 'build/trunk/assets')
mix.copy('vendor', 'build/trunk/vendor')
mix.copy('src', 'build/trunk/src')

mix.copy([
    'index.php',
    'LICENSE',
    'readme.txt',
    'wp-slim-slider.php',
], 'build/trunk/')
