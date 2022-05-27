<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Models\Post;

class ParserController extends Controller
{
    public function __invoke()
    {
        $input = file_get_contents('https://lifehacker.com/rss');
        $data = simplexml_load_string($input, 'SimpleXMLElement', LIBXML_NOCDATA);

        (new PostService())->parsePosts($data);
    }
}
