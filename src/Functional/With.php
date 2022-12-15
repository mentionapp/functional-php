<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

namespace Functional;

use Functional\Exceptions\InvalidArgumentException;

/**
 * Invoke a callback on a value if the value is not null
 *
 * @param mixed $value
 * @param callable $callback
 * @param mixed $default The default value to return if $value is null
 * @return mixed
 * @no-named-arguments
 */
function with($value, callable $callback, $default = null)
{
    InvalidArgumentException::assertCallback($callback, __FUNCTION__, 2);

    if ($value === null) {
        return $default;
    }

    return $callback($value);
}
