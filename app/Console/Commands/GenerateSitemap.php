<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->shouldCrawl(function (UriInterface $url) {
                $excludedPaths = [
                    "/admin",
                    "/account",
                    "/cart",
                    "/password/reset",
                ];

                return !Str::contains($url->getPath(), $excludedPaths);
            })
            ->hasCrawled(function (Url $url) {
                # Ignore if URL includes query string
                if (Str::contains($url->url, '?')) {
                    return;
                }

                return $url;
            })
            ->writeToFile(public_path('sitemap.xml'));
    }
}
