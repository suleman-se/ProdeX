---
name: configure-nightwatch
description: Configures Laravel Nightwatch data collection, sampling rates, filtering rules, and redaction policies. Use when setting up Nightwatch, managing data volume, protecting sensitive data (PII), or optimizing event collection for production workloads.
---

# Configure Nightwatch

This skill helps configure Laravel Nightwatch data collection to balance observability, performance, and privacy. Covers sampling strategies, filtering rules, and redaction methods across all event types.

## Data Collection Flow
Nightwatch processes events through three stages:

1. **Sampling** - Controls which entry points are captured (requests, commands, scheduled tasks)
2. **Filtering** - Excludes specific events after sampling (queries, cache, mail, etc.)
3. **Redaction** - Modifies captured data to remove/obfuscate sensitive information

```
Request/Command/Scheduled Task
       |
       v
   [Sampling?] ----NO----> Drop entire trace
       | YES
       v
   Events generated
       |
       v
   [Filtering?] ----YES---> Drop specific event
       | NO
       v
   [Redaction] ----------> Store modified data
```

## Sampling Configuration
Sampling determines which entry points (requests, commands, scheduled tasks) trigger full trace collection. When an entry point is sampled, all related events are captured.

### Global Sample Rates
Configure via environment variables:

```bash
# Default: 100% sampling (all requests/commands captured)
NIGHTWATCH_REQUEST_SAMPLE_RATE=0.1      # Recommended: 10% of requests
NIGHTWATCH_COMMAND_SAMPLE_RATE=1.0      # Capture all commands
NIGHTWATCH_EXCEPTION_SAMPLE_RATE=1.0    # Always capture exceptions
```

**Recommendation**: Start with `0.1` (10%) for requests in production, adjust based on volume and needs.

### Route-Based Sampling
Apply different rates to specific routes using the `Sample` middleware:

```php
use Illuminate\Support\Facades\Route;
use Laravel\Nightwatch\Http\Middleware\Sample;

// Sample admin routes at 100%
Route::middleware(Sample::rate(1.0))->prefix('admin')->group(function () {
    // All admin routes sampled fully
});

// Sample API routes at 5%
Route::middleware(Sample::rate(0.05))->prefix('api')->group(function () {
    // API routes sampled sparingly
});

// Always sample critical endpoints
Route::post('/checkout', [CheckoutController::class, 'process'])
    ->middleware(Sample::always());

// Never sample health checks
Route::get('/health', [HealthController::class, 'check'])
    ->middleware(Sample::never());
```

### Dynamic Sampling
Sample based on runtime conditions (user role, request attributes):

```php
use Closure;
use Illuminate\Http\Request;
use Laravel\Nightwatch\Facades\Nightwatch;

class SampleAdminRequests
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()?->isAdmin()) {
            Nightwatch::sample();  // Always sample admin requests
        }
        return $next($request);
    }
}
```

### Command Sampling
Exclude specific commands from sampling:

```php
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\Event;
use Laravel\Nightwatch\Facades\Nightwatch;

public function boot(): void
{
    Event::listen(function (CommandStarting $event) {
        if (in_array($event->command, ['schedule:finish', 'horizon:snapshot'])) {
            Nightwatch::dontSample();
        }
    });
}
```

## Filtering Configuration
Filtering excludes specific events from collection after sampling. Use filtering to reduce noise and quota usage.

### Database Queries
**Filter all queries** (disable query collection):
```bash
NIGHTWATCH_IGNORE_QUERIES=true
```

**Filter specific queries** by SQL pattern:
```php
use Laravel\Nightwatch\Facades\Nightwatch;
use Laravel\Nightwatch\Records\Query;

public function boot(): void
{
    // Filter job table queries
    Nightwatch::rejectQueries(function (Query $query) {
        return str_contains($query->sql, 'into "jobs"');
    });
}
```

### Cache Events
**Filter all cache events**:
```bash
NIGHTWATCH_IGNORE_CACHE_EVENTS=true
```

**Filter by cache key patterns**:
```php
Nightwatch::rejectCacheKeys([
    'my-app:users',                    // Exact match
    '/^my-app:posts:/',                // Regex
]);
```

## Redaction Configuration
Redaction modifies captured data to remove or obfuscate sensitive information. Unlike filtering, redaction keeps the event but sanitizes its content.

### Request Redaction
**Redact sensitive headers**:
```bash
NIGHTWATCH_REDACT_HEADERS=Authorization,Cookie,Proxy-Authorization,X-API-Key
```

**Redact request payloads**:
```bash
NIGHTWATCH_CAPTURE_REQUEST_PAYLOAD=true
NIGHTWATCH_REDACT_PAYLOAD_FIELDS=password,password_confirmation,ssn,credit_card
```

### Programmatic Redaction
```php
use Laravel\Nightwatch\Facades\Nightwatch;
use Laravel\Nightwatch\Records\Request;

Nightwatch::redactRequests(function (Request $request) {
    $request->url = str_replace('secret', '***', $request->url);
});
```
