<?php

$route = [
    "/" => "Home@view",
    "" => "Home@view",
    "/menu" => "Menu@viewData",
    "/menu/input" => "Menu@viewInput",
    "/menu/save" => "Menu@save",
    "/menu/delete" => "Menu@delete",
    
    "/post" => "Post@viewData",
    "/post/input" => "Post@viewInput",
    "/post/save" => "Post@save",
    "/post/delete" => "Post@delete",
];
