<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'luna-demo');

// Project repository
set('repository', 'https://github.com/ilbonzo/steps-to-better-manage-and-deploy-code-demo.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', []);
set('shared_dirs', [
    'site/web/content/uploads'
]);

// Writable dirs by web server
set('writable_dirs', ['site/web/content/uploads']);
set('allow_anonymous_stats', false);

set('composer_options', 'install -d site');

// Hosts
host('localhost')
    ->set('deploy_path', '~/{{application}}');


// Tasks
task('deploy:copy_config', function () {
    upload('site/wp-config.php.development', '~/{{application}}/current/site/web/wp/wp-config.php');
});

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'deploy:copy_config',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
