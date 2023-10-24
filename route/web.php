<?php

$route = [
    "/" => "Home@view",
    "/menu" => "Menu@viewData",
    "/menu/input" => "Menu@viewInput",
    "/menu/save" => "Menu@save",
    "/menu/delete" => "Menu@delete",
    
    "/post" => "Post@view",
    "/post-save" => "Post@save",
    "/post-delete" => "Post@delete",
];
