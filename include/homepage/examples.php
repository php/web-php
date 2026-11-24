<?php

/*
 * Code examples shown in the homepage editor. `code`, `command` and `output`
 * are pre-highlighted HTML; the tok-* classes are styled in /styles/components.css.
 */
return [
    'controller' => [
        'file' => 'UserController.php',
        'description' => 'Attributes, typed properties, and constructor injection; a whole JSON endpoint in one class.',
        'code' => <<<'HTML'
<span class="tok-comment">&lt;?php</span>
<span class="tok-comment tok-italic">// Map a web request to a JSON response.</span>

<span class="tok-keyword">class</span> <span class="tok-type">UserController</span>
{
    <span class="tok-keyword">public function</span> <span class="tok-function">__construct</span>(
        <span class="tok-keyword">private readonly</span> <span class="tok-type">UserRepository</span> <span class="tok-text">$users</span>,
    ) {}

    #[<span class="tok-function">Route</span>(<span class="tok-string">&#x27;/users/{id}&#x27;</span>, methods: [<span class="tok-string">&#x27;GET&#x27;</span>])]
    <span class="tok-keyword">public function</span> <span class="tok-function">show</span>(int <span class="tok-text">$id</span>): <span class="tok-type">Response</span>
    {
        <span class="tok-text">$user</span> = <span class="tok-text">$this</span>-&gt;<span class="tok-text">users</span>-&gt;<span class="tok-function">find</span>(<span class="tok-text">$id</span>)
            ?? <span class="tok-keyword">throw new</span> <span class="tok-function">NotFoundException</span>();

        <span class="tok-keyword">return</span> <span class="tok-type">Response</span>::<span class="tok-function">json</span>([
            <span class="tok-string">&#x27;id&#x27;</span> =&gt; <span class="tok-text">$user</span>-&gt;<span class="tok-text">id</span>,
            <span class="tok-string">&#x27;name&#x27;</span> =&gt; <span class="tok-text">$user</span>-&gt;<span class="tok-text">name</span>,
        ]);
    }
}
HTML,
        'command' => '<span class="tok-function">curl</span> localhost:8000/users/42',
        'output' => <<<'HTML'
<span class="tok-comment">{&quot;id&quot;:42,&quot;name&quot;:&quot;Ada Lovelace&quot;}</span>
HTML,
    ],
    'cli' => [
        'file' => 'GreetCommand.php',
        'description' => 'Attributes describe arguments and options; the method signature <em>is</em> the command.',
        'code' => <<<'HTML'
<span class="tok-comment">&lt;?php</span>
<span class="tok-comment tok-italic">// Turn a plain method into a command-line tool.</span>

#[<span class="tok-function">AsCommand</span>(<span class="tok-string">&#x27;greet&#x27;</span>, <span class="tok-string">&#x27;Say hello to someone&#x27;</span>)]
<span class="tok-keyword">class</span> <span class="tok-type">GreetCommand</span>
{
    <span class="tok-keyword">public function</span> <span class="tok-function">__invoke</span>(
        <span class="tok-type">OutputInterface</span> <span class="tok-text">$output</span>,
        #[<span class="tok-function">Argument</span>] string <span class="tok-text">$name</span>,
        #[<span class="tok-function">Option</span>] bool <span class="tok-text">$shout</span> = <span class="tok-keyword">false</span>,
    ): int {
        <span class="tok-text">$greeting</span> = <span class="tok-string">&quot;Hello, {$name}!&quot;</span>;

        <span class="tok-text">$output</span>-&gt;<span class="tok-function">writeln</span>(<span class="tok-text">$shout</span> ? <span class="tok-function">strtoupper</span>(<span class="tok-text">$greeting</span>) : <span class="tok-text">$greeting</span>);

        <span class="tok-keyword">return</span> <span class="tok-type">Command</span>::<span class="tok-type">SUCCESS</span>;
    }
}
HTML,
        'command' => '<span class="tok-function">php</span> bin/console greet Ada --shout',
        'output' => <<<'HTML'
<span class="tok-comment">HELLO, ADA!</span>
HTML,
    ],
    'api' => [
        'file' => 'release_date.php',
        'description' => 'Code against PSR standard interfaces, then plug in whichever HTTP client you like.',
        'code' => <<<'HTML'
<span class="tok-comment">&lt;?php</span>
<span class="tok-comment tok-italic">// Call a JSON API with an HTTP client.</span>

<span class="tok-keyword">function</span> <span class="tok-function">releaseDate</span>(
    <span class="tok-type">ClientInterface</span> <span class="tok-text">$http</span>,
    <span class="tok-type">RequestFactoryInterface</span> <span class="tok-text">$requests</span>,
    string <span class="tok-text">$version</span>,
): string {
    <span class="tok-text">$request</span> = <span class="tok-text">$requests</span>
        -&gt;<span class="tok-function">createRequest</span>(<span class="tok-string">&#x27;GET&#x27;</span>, <span class="tok-string">&quot;https://www.php.net/releases/?json&amp;version={$version}&quot;</span>)
        -&gt;<span class="tok-function">withHeader</span>(<span class="tok-string">&#x27;Accept&#x27;</span>, <span class="tok-string">&#x27;application/json&#x27;</span>);

    <span class="tok-text">$response</span> = <span class="tok-text">$http</span>-&gt;<span class="tok-function">sendRequest</span>(<span class="tok-text">$request</span>);
    <span class="tok-text">$release</span> = <span class="tok-function">json_decode</span>(<span class="tok-text">$response</span>-&gt;<span class="tok-function">getBody</span>(), flags: <span class="tok-type">JSON_THROW_ON_ERROR</span>);

    <span class="tok-keyword">return</span> <span class="tok-text">$release</span>-&gt;<span class="tok-text">date</span>;
}

<span class="tok-keyword">echo</span> <span class="tok-function">releaseDate</span>(<span class="tok-keyword">new</span> <span class="tok-type">GuzzleHttp\Client</span>(), <span class="tok-keyword">new</span> <span class="tok-type">GuzzleHttp\Psr7\HttpFactory</span>(), <span class="tok-string">&#x27;8.0.0&#x27;</span>);
HTML,
        'command' => '<span class="tok-function">php</span> release_date.php',
        'output' => <<<'HTML'
<span class="tok-comment">26 Nov 2020</span>
HTML,
    ],
    'streams' => [
        'file' => 'stream_large_dataset.php',
        'description' => 'Generators walk a file larger than memory, one record at a time.',
        'code' => <<<'HTML'
<span class="tok-comment">&lt;?php</span>
<span class="tok-comment tok-italic">// Read a compressed event log, one record at a time.</span>

<span class="tok-keyword">function</span> <span class="tok-function">events</span>(string <span class="tok-text">$file</span>): <span class="tok-type">Generator</span>
{
    <span class="tok-text">$stream</span> = <span class="tok-keyword">new</span> <span class="tok-function">SplFileObject</span>(<span class="tok-string">&quot;compress.zlib://{$file}&quot;</span>);

    <span class="tok-keyword">foreach</span> (<span class="tok-text">$stream</span> <span class="tok-keyword">as</span> <span class="tok-text">$line</span>) {
        <span class="tok-keyword">if</span> (<span class="tok-function">trim</span>(<span class="tok-text">$line</span>) !== <span class="tok-string">&#x27;&#x27;</span>) {
            <span class="tok-keyword">yield</span> <span class="tok-function">json_decode</span>(<span class="tok-text">$line</span>, flags: <span class="tok-type">JSON_THROW_ON_ERROR</span>);
        }
    }
}

<span class="tok-keyword">foreach</span> (<span class="tok-function">events</span>(<span class="tok-string">&#x27;events.ndjson.gz&#x27;</span>) <span class="tok-keyword">as</span> <span class="tok-text">$event</span>) {
    <span class="tok-keyword">echo</span> <span class="tok-string">&quot;{$event-&gt;type}\n&quot;</span>;
}
HTML,
        'command' => '<span class="tok-function">php</span> stream_large_dataset.php',
        'output' => <<<'HTML'
<span class="tok-comment">invoice.created
payment.received
order.shipped</span>
HTML,
    ],
    'html' => [
        'file' => 'extract_headlines.php',
        'description' => 'Fetch a live page and query it with CSS selectors, using the built-in DOM parser.',
        'code' => <<<'HTML'
<span class="tok-comment">&lt;?php</span>
<span class="tok-comment tok-italic">// Fetch a live page and extract its headlines with CSS selectors.</span>

<span class="tok-text">$html</span> = <span class="tok-function">file_get_contents</span>(<span class="tok-string">&#x27;https://www.php.net/archive/2026.php&#x27;</span>);

<span class="tok-text">$page</span> = Dom\HTMLDocument::<span class="tok-function">createFromString</span>(<span class="tok-text">$html</span>, <span class="tok-type">LIBXML_NOERROR</span>);
<span class="tok-text">$headlines</span> = [];

<span class="tok-keyword">foreach</span> (<span class="tok-text">$page</span>-&gt;<span class="tok-function">querySelectorAll</span>(<span class="tok-string">&#x27;article h2&#x27;</span>) <span class="tok-keyword">as</span> <span class="tok-text">$heading</span>) {
    <span class="tok-text">$headlines</span>[] = <span class="tok-function">trim</span>(<span class="tok-text">$heading</span>-&gt;textContent);
}

<span class="tok-comment tok-italic">// The archive is newest-first, so the year&#x27;s first posts are at the end.</span>
<span class="tok-keyword">echo</span> <span class="tok-function">json_encode</span>(<span class="tok-function">array_slice</span>(<span class="tok-function">array_reverse</span>(<span class="tok-text">$headlines</span>), 0, 3), <span class="tok-type">JSON_PRETTY_PRINT</span>);
HTML,
        'command' => '<span class="tok-function">php</span> extract_headlines.php',
        'output' => <<<'HTML'
<span class="tok-comment">[
    &quot;PHP Velho Oeste 2026&quot;,
    &quot;PHP 8.4.17 Released!&quot;,
    &quot;PHP 8.3.30 Released!&quot;
]</span>
HTML,
    ],
];
