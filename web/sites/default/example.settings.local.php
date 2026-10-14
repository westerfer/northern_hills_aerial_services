<?php

// phpcs:ignoreFile

/**
 * @file
 * Local development override configuration for Northern Hills Aerial Services.
 *
 * This template is committed to the repository. DDEV copies it to
 * settings.local.php (which is git-ignored) on "ddev start" if that file does
 * not exist yet. Edit settings.local.php freely; it is never committed.
 *
 * Do NOT use these settings on a production site.
 */

/**
 * Load development services (Twig debugging, null cache backend, cacheability
 * debug headers, lenient config schema checking).
 */
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';
$settings['container_yamls'][] = __DIR__ . '/local.services.yml';

/**
 * Show all error messages, with backtrace information.
 */
$config['system.logging']['error_level'] = 'verbose';

/**
 * Disable CSS and JS aggregation.
 */
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

/**
 * Disable the render cache, page cache and dynamic page cache so template,
 * theme and markup changes show up immediately.
 *
 * If page load times get too slow while working on back-end code, comment
 * these out and run "ddev drush cr" when needed instead.
 */
$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
$settings['cache']['bins']['discovery_migration'] = 'cache.backend.memory';

/**
 * Set to TRUE to allow core test modules and themes to be installed.
 */
$settings['extension_discovery_scan_tests'] = FALSE;

/**
 * Enable access to rebuild.php.
 */
$settings['rebuild_access'] = TRUE;

/**
 * Skip file system permissions hardening so DDEV (and git) can write to
 * sites/default without permission errors.
 */
$settings['skip_permissions_hardening'] = TRUE;

/**
 * Trust the DDEV hostnames.
 */
$settings['trusted_host_patterns'] = [
  '^.+\.ddev\.site$',
  '^localhost$',
  '^127\.0\.0\.1$',
];

/**
 * Private file path, outside the web root. Created by DDEV on start.
 */
$settings['file_private_path'] = '../private';

/**
 * Keep development-only modules out of exported configuration.
 */
$settings['config_exclude_modules'] = ['devel', 'stage_file_proxy'];
