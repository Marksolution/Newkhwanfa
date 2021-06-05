<?php

namespace Deployer;

// Include the Laravel & rsync recipes
require 'recipe/laravel.php';
require 'recipe/rsync.php';

set('application', 'OTOP ONLINE');
set('ssh_multiplexing', true); // Speeds up deployments

set('rsync_src', function () {
    return __DIR__; // If your project isn't in the root, you'll need to change this.
});

// Configuring the rsync exclusions. Ok
// You'll want to exclude anything that you don't want on the production server.
add('rsync', [
    'exclude' => [
        '.git',
        '/.env',
        '/storage/',
        '/vendor/',
        '/node_modules/',
        '.github',
        'deploy.php',
    ],
    'include'       => ['/database/seeds/provinces.sql'],
    'include-file'  => true,
]);


// Set up a deployer task to copy secrets to the server.
// Since our secrets are stored in Gitlab, we can access them as env vars.
task('deploy:secrets', function () {
    file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
    upload('.env', get('deploy_path') . '/shared');
});

// Production Server
host('narubate.com') // Name of the server
->hostname('138.197.52.157') // Hostname or IP address
->stage('production') // Deployment stage (production, staging, etc)
->user('root') // SSH user
->set('deploy_path', '/var/www/app'); // Deploy path

// Staging Server
host('beta.narubate.com') // Name of the server
->hostname('138.197.52.157') // Hostname or IP address
->stage('staging') // Deployment stage (production, staging, etc)
->user('root') // SSH user
->set('deploy_path', '/var/www/app-beta'); // Deploy path

after('deploy:failed', 'deploy:unlock'); // Unlock after failed deploy

desc('Deploy the application');

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'rsync', // Deploy code & built assets
    'deploy:secrets', // Deploy secrets
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:storage:link', // |
    'artisan:view:cache',   // |
    'artisan:config:cache', // | Laravel Specific steps
    //'artisan:optimize',     // |
    'artisan:migrate',
    //'artisan:config:clear',
    //'artisan:passport:install',
    'artisan:db:seed',      // |
    'artisan:queue:restart',// |
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);