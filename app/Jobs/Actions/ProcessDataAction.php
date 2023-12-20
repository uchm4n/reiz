<?php

namespace App\Jobs\Actions;

use Closure;
use Symfony\Component\DomCrawler\Crawler;

class ProcessDataAction
{

    public function handle(Crawler $data, Closure $next)
    {
        // fine tune the crawler here
        $data = $data
            // ->text()
            ->extract(['_text']);

        // sanitize data. trim, and implode in to string again
        if (isset($data[0]) && is_string($data[0])) {
            $data = collect(explode(PHP_EOL, (string)$data[0]))
                ->map(fn($item) => trim($item)) // trim white spaces
                ->filter() // filter out empty
                ->implode(' ' .PHP_EOL .' '); // convert to text. can add other modifications
        }

        return $next($data);
    }

}