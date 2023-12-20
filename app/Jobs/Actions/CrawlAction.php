<?php

namespace App\Jobs\Actions;

use Closure;
use App\Models\ReizJob;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class CrawlAction
{
    public function handle(ReizJob $data, Closure $next)
    {
        /** @var ReizJob $data */
        $browser = new HttpBrowser(HttpClient::create());
        $browser->request('GET', $data->url);
        $data = $browser->getCrawler()->filter($data->selectors);
        return $next($data);
    }
}