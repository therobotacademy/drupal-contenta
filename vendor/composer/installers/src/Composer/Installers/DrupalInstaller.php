<?php
namespace Composer\Installers;

class DrupalInstaller extends BaseInstaller
{
    protected $locations = array(
        'core'      => 'core/',
        'module'    => 'modules/{$name}/',
        'theme'     => 'themes/{$name}/',
        'library'   => 'libraries/{$name}/',
        'profile'   => 'profiles/{$name}/',
        'drush'     => 'drush/{$name}/',
	    'custom-theme' => 'themes/custom/{$name}/',
<<<<<<< HEAD
	    'custom-module' => 'modules/custom/{$name}/',
=======
	    'custom-module' => 'modules/custom/{$name}',
>>>>>>> pantheon-drops-8/master
    );
}
