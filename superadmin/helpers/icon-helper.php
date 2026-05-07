<?php

function icon($name, $classes = '')
{
    return '
        <span class="material-symbols-outlined ' . $classes . '">
            ' . $name . '
        </span>
    ';
}
