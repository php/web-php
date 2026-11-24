<?php

/*
 * Code examples shown in the homepage editor, as plain text. public/index.php
 * highlights `code` and `imports` with highlight_php_trimmed() (include/layout.inc),
 * the same highlighter as the release pages.
 *
 * `imports` is optional. It is shown folded to a single `use ...;` line (expandable)
 * after the first blank line of `code`.
 */
return [
    'controller' => [
        'file' => 'UserController.php',
        'description' => 'Attributes, typed properties, and constructor injection; a whole JSON endpoint in one class.',
        'imports' => <<<'PHP'
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
PHP,
        'code' => <<<'PHP'
<?php
// Map a web request to a JSON response.

class UserController
{
    public function __construct(
        private readonly UserRepository $users,
    ) {}

    #[Route('/users/{id}', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $user = $this->users->find($id)
            ?? throw new NotFoundHttpException();

        return new JsonResponse([
            'id' => $user->id,
            'name' => $user->name,
        ]);
    }
}
PHP,
        'command' => 'curl localhost:8000/users/42',
        'output' => '{"id":42,"name":"Ada Lovelace"}',
    ],
    'cli' => [
        'file' => 'GreetCommand.php',
        'description' => 'Attributes describe arguments and options; the method signature <em>is</em> the command.',
        'imports' => <<<'PHP'
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Attribute\Option;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
PHP,
        'code' => <<<'PHP'
<?php
// Turn a plain method into a command-line tool.

#[AsCommand('greet', 'Say hello to someone')]
class GreetCommand
{
    public function __invoke(
        OutputInterface $output,
        #[Argument] string $name,
        #[Option] bool $shout = false,
    ): int {
        $greeting = "Hello, {$name}!";

        $output->writeln($shout ? strtoupper($greeting) : $greeting);

        return Command::SUCCESS;
    }
}
PHP,
        'command' => 'php bin/console greet Ada --shout',
        'output' => 'HELLO, ADA!',
    ],
    'api' => [
        'file' => 'release_date.php',
        'description' => 'Code against PSR standard interfaces, then plug in whichever HTTP client you like.',
        'imports' => <<<'PHP'
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
PHP,
        'code' => <<<'PHP'
<?php
// Call a JSON API with an HTTP client.

function releaseDate(
    ClientInterface $http,
    RequestFactoryInterface $requests,
    string $version,
): string {
    $request = $requests
        ->createRequest('GET', "https://www.php.net/releases/?json&version={$version}")
        ->withHeader('Accept', 'application/json');

    $response = $http->sendRequest($request);
    $release = json_decode($response->getBody(), flags: JSON_THROW_ON_ERROR);

    return $release->date;
}

echo releaseDate(new Client(), new HttpFactory(), '8.0.0');
PHP,
        'command' => 'php release_date.php',
        'output' => '26 Nov 2020',
    ],
    'streams' => [
        'file' => 'stream_large_dataset.php',
        'description' => 'Generators walk a file larger than memory, one record at a time.',
        'code' => <<<'PHP'
<?php
// Read a compressed event log, one record at a time.

function events(string $file): Generator
{
    $stream = new SplFileObject("compress.zlib://{$file}");

    foreach ($stream as $line) {
        if (trim($line) !== '') {
            yield json_decode($line, flags: JSON_THROW_ON_ERROR);
        }
    }
}

foreach (events('events.ndjson.gz') as $event) {
    echo "{$event->type}\n";
}
PHP,
        'command' => 'php stream_large_dataset.php',
        'output' => <<<'TEXT'
invoice.created
payment.received
order.shipped
TEXT,
    ],
    'html' => [
        'file' => 'extract_headlines.php',
        'description' => 'Scrape a live page with the built-in DOM parser in one pipeline: <code>?</code> placeholders partially apply each function, and <code>|&gt;</code> feeds it the previous result.',
        'code' => <<<'PHP'
<?php
// Fetch a live page and extract its headlines with CSS selectors.

$headlines = file_get_contents('https://www.php.net/archive/2026.php')
    |> Dom\HTMLDocument::createFromString(?, LIBXML_NOERROR)
    |> (fn ($page) => $page->querySelectorAll('article h2'))
    |> iterator_to_array(...)
    |> array_map(fn ($heading) => trim($heading->textContent), ?)
    |> array_reverse(...)
    |> array_slice(?, 0, 3);

echo json_encode($headlines, JSON_PRETTY_PRINT);
PHP,
        'command' => 'php extract_headlines.php',
        'output' => <<<'TEXT'
[
    "PHP Velho Oeste 2026",
    "PHP 8.4.17 Released!",
    "PHP 8.3.30 Released!"
]
TEXT,
    ],
];
