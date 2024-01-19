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
 * Returns all items from $collection except first element (head). Preserves $collection keys.
 * Takes an optional callback for filtering the collection.
 *
 * @template K of array-key
 * @template V
 *
 * @param iterable<K,V> $collection
 * @param callable(V,K,iterable<K,V>):mixed $callback
 *
 * @return array<K,V>
 *
 * @no-named-arguments
 */
function tail($collection, callable $callback = null)
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    $tail = [];
    $isHead = true;

    foreach ($collection as $index => $element) {
        if ($isHead) {
            $isHead = false;
            continue;
        }

        if (null === $callback || $callback($element, $index, $collection)) {
            $tail[$index] = $element;
        }
    }

    return $tail;
}
