<?php
function RemoveEnWikiInternalLink($text)
{
    $text = preg_replace("/\[\[:en:/", "[[", $text);

    return $text;
}