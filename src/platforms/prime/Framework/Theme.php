<?php
/**
 * @package   Gantry5
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2015 RocketTheme, LLC
 * @license   MIT
 *
 * http://opensource.org/licenses/MIT
 */

namespace Gantry\Framework;

use Gantry\Component\Theme\AbstractTheme;
use Gantry\Component\Theme\ThemeTrait;
use RocketTheme\Toolbox\ResourceLocator\UniformResourceLocator;

/**
 * Class Theme
 * @package Gantry\Framework
 */
class Theme extends AbstractTheme
{
    use ThemeTrait;

    /**
     * @var string
     */
    public $url;

    /**
     * @see AbstractTheme::init()
     */
    protected function init()
    {
        parent::init();

        $this->url = dirname($_SERVER['SCRIPT_NAME']);
    }

    /**
     * @see AbstractTheme::setTwigLoaderPaths()
     *
     * @param \Twig_Loader_Filesystem $loader
     */
    protected function setTwigLoaderPaths(\Twig_Loader_Filesystem $loader)
    {
        $gantry = static::gantry();

        /** @var UniformResourceLocator $locator */
        $locator = $gantry['locator'];

        $loader->setPaths($locator->findResources('gantry-engine://twig'));
        $loader->setPaths($locator->findResources('gantry-pages://'), 'pages');
        $loader->setPaths($locator->findResources('gantry-positions://'), 'positions');

        parent::setTwigLoaderPaths($loader);
    }
}
