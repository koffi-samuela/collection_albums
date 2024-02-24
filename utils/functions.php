<?php
function redirectToRoute($route)
{
    header('Location: index.php?path=' . $route);
    exit();
};