<?php

namespace App\Http\Controllers;

use App\Documentation;
use Cache;
use Image;
use Request;

class DocsController extends Controller
{
    protected $docs;

    public function __construct(\App\Documentation $docs) {
        $this->docs = $docs;
    }

    public function image($file) {
        $image = $this->docs->image($file);

        return response($image->encode('png'), 200, [
           'content-Type' => 'image/png'
        ]);
    }

    public function show($file = null)
    {
        $index = \Cache::remember('docs.index', 120, function() {
            return $index = markdown($this->docs->get());
        });

        $content = \Cache::remember("docs.{$file}", 120, function () use ($file) {
            return $content = markdown($this->docs->get($file ?: 'installation.md'));
        });

        return view('docs.show', compact('index', 'content'));
    }
}
