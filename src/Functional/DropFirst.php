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
 * Drop all elements from a collection until callback returns false
 *
 * @template K of array-key
 * @template V
 *
 * @param iterable<K, V> $collection
 * @param callable(V, K, iterable<K, V>):bool $callback
 *
 * @return array<K,V>
 *
 * @no-named-arguments
 */
function drop_first($collection, callable $callback)
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    $result = [];

    $drop = true;
    foreach ($collection as $index => $element) {
        if ($drop) {
            if ($callback($element, $index, $collection)) {
                continue;
            }

            $drop = false;
        }

        $result[$index] = $element;
    }

    return $result;
}
