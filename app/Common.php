<?php

/**
 * Converts a string with newlines into an HTML unordered list.
 */
function nl2ul(string $string): string
{
    $items = array_filter(explode("\n", trim($string)));
    if (empty($items)) {
        return '<p>Not specified.</p>';
    }

    $html = '<ul class="icon-list">';
    foreach ($items as $item) {
        $html .= '<li><i class="bi bi-check-circle-fill"></i>' . esc(trim($item)) . '</li>';
    }
    $html .= '</ul>';
    return $html;
}

/**
 * Converts a comma-separated string of tags into styled HTML badges.
 * FIX: Changed 'string $tags_string = null' to '?string $tags_string' to make it explicitly nullable.
 */
function display_tags(?string $tags_string = null): string
{
    if (empty($tags_string)) {
        return '';
    }
    $tags = explode(',', $tags_string);
    $html = '<div class="tags-section">';
    foreach ($tags as $tag) {
        $html .= '<span class="badge bg-info me-1"><i class="bi bi-tag-fill"></i> ' . esc(trim($tag)) . '</span>';
    }
    $html .= '</div>';
    return $html;
}