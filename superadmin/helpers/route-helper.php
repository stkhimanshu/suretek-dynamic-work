<?php

function isActive($path)
{
    return $_SERVER['REQUEST_URI'] === $path;
}
