<?php

namespace OrlandoLibardi\ContactCms\app\Providers;

use BadMethodCallException;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\UrlGenerator;

use OrlandoLibardi\ContactCms\app\Contact;


class OlCmsContactBuilder
{
    protected $defaults;
    protected $accepted = [];
    protected $params;
    protected $host;
    /**
     * The URL generator instance.
     *
     * @var \Illuminate\Contracts\Routing\UrlGenerator
     */
    protected $url;

    /**
     * Create a new form builder instance.
     *
     * @param  \Illuminate\Contracts\Routing\UrlGenerator $url
     */
    public function __construct()
    {
        $this->url = url()->current();
        $this->host = request()->getSchemeAndHttpHost();
    }

    public function form($alias=false)
    {             

    }

   
    

}