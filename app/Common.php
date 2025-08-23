<?php

/**
 * Converts a string with newlines into an HTML unordered list.
 *
 * @param string $string The input string.
 * @return string The formatted HTML list.
 */
function nl2ul(string $string): string
{
    $items = array_filter(explode("\n", trim($string)));
    if (empty($items)) {
        return '';
    }
    $html = '<ul>';
    foreach ($items as $item) {
        $html .= '<li>' . esc(trim($item)) . '</li>';
    }
    $html .= '</ul>';
    return $html;
}