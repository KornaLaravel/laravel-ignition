<?php

namespace Spatie\LaravelIgnition\FlareMiddleware;

use Illuminate\Log\Context\Repository;
use Illuminate\Support\Facades\Context;
use Spatie\FlareClient\FlareMiddleware\FlareMiddleware;
use Spatie\FlareClient\Report;
use Closure;

class AddContext implements FlareMiddleware
{
    public function handle(Report $report, Closure $next)
    {
        if (! class_exists(Repository::class)) {
            return;
        }

        $report->group('context', Context::all());
    }
}
