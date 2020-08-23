<?php

namespace Core\View\Extension;

use Core\View\Engine;

/**
 * A common interface for extensions.
 */
interface ExtensionInterface
{
    public function register(Engine $engine);
}
