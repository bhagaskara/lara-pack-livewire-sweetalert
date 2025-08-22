<?php

namespace LaraPack\LivewireSweetalert\Http\Middleware;

use Closure;

class InjectScript
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (
            $response->headers->has('Content-Type') &&
            str_contains($response->headers->get('Content-Type'), 'text/html')
        ) {
            $content = $response->getContent();

            $script = file_get_contents(__DIR__ . '/../../../resources/js/livewire-events.js');
            $scriptTag = '<script>' . $script . '</script>';

            // Inject sebelum tag </body>
            if (str_contains($content, '</body>')) {
                $content = str_replace('</body>', $scriptTag . '</body>', $content);
                $response->setContent($content);
            }
        }

        return $response;
    }
}
