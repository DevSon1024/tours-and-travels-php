<?php

/**
 * Converts a string with newlines into an HTML unordered list.
 *
 * @param string $string The input string.
 * @return string The formatted HTML list.
 */
function nl2ul(string $string): string
{
    // Split the string by new lines, removing empty lines
    $items = array_filter(explode("\n", trim($string)));
    if (empty($items)) {
        return '<p>Not specified.</p>';
    }

    $html = '<ul class="icon-list">';
    foreach ($items as $item) {
        // Trim each item to remove extra whitespace
        $html .= '<li><i class="bi bi-check-circle-fill"></i>' . esc(trim($item)) . '</li>';
    }
    $html .= '</ul>';
    return $html;
}