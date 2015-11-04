<?php
namespace Plugins\Pjax;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\DomCrawler\Crawler;

class PjaxMiddleware
{

    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if (!$response->isRedirection()) {
            if ($request->pjax()) {
                $crawler = new Crawler($response->getContent());
                $response_title = $crawler->filter('head > title');
                $response_container = $crawler->filter($request->header('X-PJAX-CONTAINER'));
                if ($response_container->count() != 0) {
                    $title = '';
                    if ($response_title->count() != 0) {
                        $title = '<title>' . $response_title->html() . '</title>';
                    }
                    $response->setContent($title . $response_container->html());
                }
                $response->header('X-PJAX-URL', $request->getRequestUri());
            }
        }
        return $response;
    }
}