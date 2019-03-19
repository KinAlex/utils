<?php

namespace kinshin\utils;

/**
 * Class Util
 */
class Util
{
    const BRACES = [
        '(' => ')',
        '[' => ']',
        '{' => '}',
    ];

    /**
     * Check if braces are bakanced.
     *
     * @param string $str String of braces.
     *
     * @return bool
     */
    public static function checkCorrectBraces(string $str): bool
    {
        $charArray = str_split($str);
        $stack     = new \SplStack();
        foreach ($charArray as $c) {
            if ($c === '(' || $c === '[' || $c === '{') {
                $stack->push($c);
                continue;
            }
            if ($c === ')' || $c === ']' || $c === '}') {
                try {
                    $last = $stack->pop();
                    if (self::BRACES[$last] !== $c) {
                        return false;
                    }
                } catch (\Exception $e) {
                    return false;
                }
                continue;
            }
        }
        return $stack->isEmpty();
    }
}
