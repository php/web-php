<?php
$_SERVER['BASE_PAGE'] = 'why-use-php.php';
include_once __DIR__ . '/include/prepend.inc';
site_header('Why Use PHP? Fast, Flexible, Powerful Web Development', [
    'current' => 'community',
    'description' => 'PHP is the ideal choice for web development. Learn about its speed, flexibility, and rich ecosystem. Explore PHP\'s capabilities in building websites, APIs, e-commerce platforms, and more. See why industry leaders trust PHP for their projects.',
    'css' => ['why-use-php.css'],
]);
?>

<div class="block block--grid">
    <div class="block__intro">
        <div class="title">Why Use PHP?</div>

        <div class="hero">
            <div class="subtitle">Fast, Flexible, Pragmatic. Everywhere.</div>
            <div class="description">
                <p>PHP is a general-purpose language that excels on the web.</p>
                <p>Here are some compelling reasons to choose PHP:</p>
            </div>
            <ul>
                <li>Versatile and widely adopted</li>
                <li>Extensive ecosystem of libraries and frameworks</li>
                <li>Excellent performance and scalability</li>
                <li>Strong community support</li>
                <li>Cost-effective development</li>
            </ul>

            <div class="subtitle">With PHP You Can Do More and Deliver Faster!</div>
        </div>
    </div>
    <div class="block__body">
        <?php highlight_php_trimmed(
            <<<'PHP'
class HomeController
{
    #[Route(path: '/', method: HttpMethod::GET)]
    public function index(): Response
    {
        return new Response(
            headers: ['Content-Type' => 'text/html'],
            body: '<h1>Welcome to the Modern PHP Application!</h1>'
        );
    }

    #[Route(path: '/user/{id}', method: HttpMethod::GET)]
    public function user(int $id): Response
    {
        return new Response(
            body: "User ID: $id"
        );
    }
}
PHP
        ); ?>
    </div>
</div>

<div class="block">
    <div class="block__intro">
        <div class="title">Who Uses PHP</div>
        <div class="description">PHP powers some of the world's most popular websites and platforms</div>
    </div>
    <div class="block__body">
        <div class="logos">
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://edmff3urfwf.exactdn.com/app/themes/spryker-website/dist/Components/NavigationFooter/Assets/logo-9dc549614a.svg" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
            <div class="logo__item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt=""/>
            </div>
        </div>
    </div>
</div>

<div class="block">
    <div class="cards">
        <div class="card card--columns">
            <div class="card__info">
                <div class="card__title">Stable and Secure</div>
                <div class="card__body">
                    <div class="subtitle">PHP has a rich history spanning over 29 years, resulting in:</div>
                    <ul>
                        <li>Fewer bugs due to extensive testing and refinement</li>
                        <li>Predictable release cycle</li>
                        <li>Stable API, ensuring backward compatibility</li>
                        <li>Regular security updates and audits</li>
                    </ul>
                </div>
            </div>
            <div class="card__cover">
                <img src="https://placehold.co/1920x1080" alt=""/>
            </div>
        </div>
        <div class="card card--columns">
            <div class="card__info">
                <div class="card__title">Fast and Efficient</div>
                <div class="card__body">
                    <div class="subtitle">PHP consistently ranks among the fastest server-side languages:</div>
                    <ul>
                        <li>Outperforms Python and Ruby in benchmarks</li>
                        <li>Built-in opcode caching for improved performance</li>
                        <li>Supports asynchronous programming with libraries like Swoole and ReactPHP</li>
                        <li>Has modern application servers for containerized applications:
                            <a href="#">FrankenPHP</a>, <a href="#">RoadRunner</a></li>
                    </ul>
                </div>
            </div>
            <div class="card__cover">
                <img src="https://placehold.co/1920x1080" alt=""/>
            </div>
        </div>
        <div class="card card--columns">
            <div class="card__info">
                <div class="card__title">Rich Ecosystem</div>
                <div class="card__body">
                    <div class="subtitle">PHP boasts a thriving ecosystem that speeds up development:</div>
                    <ul>
                        <li>
                            <a href="https://getcomposer.org/">Composer</a>: The package manager for PHP with over
                            <a href="https://packagist.org/statistics">400,000 packages</a>.
                        </li>
                        <li>
                            Popular frameworks: <a href="https://laravel.com/">Laravel</a>, <a
                                    href="https://symfony.com/">Symfony</a>,
                            <a href="https://getlaminas.org/">Laminas</a>, and more.
                        </li>
                        <li>
                            Content Management Systems:
                            <a href="https://wordpress.com/">WordPress</a>, <a href="https://www.drupal.org/">Drupal</a>,
                            <a href="https://www.joomla.org/">Joomla!</a>, <a href="https://typo3.org/">TYPO3</a>.
                        </li>
                        <li>Learning Management Systems: <a href="https://moodle.org/">Moodle</a>.</li>
                        <li>
                            E-commerce platforms: <a href="https://woocommerce.com/">WooCommerce</a>,
                            <a href="https://www.shopware.com/">Shopware</a>,
                            <a href="https://prestashop.com/">PrestaShop</a>.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card__cover">
                <img src="https://placehold.co/1920x1080" alt=""/>
            </div>
        </div>
    </div>
</div>

<div class="block">
    <div class="block__intro">
        <div class="title">Success Stories</div>
        <div class="description">PHP continues to attract significant investments and power successful businesses:</div>
    </div>
    <div class="block__body">
        <div class="cards cards--2">
            <div class="card">
                <div class="card__image">
                    <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel"/>
                </div>
                <div class="subtitle">Laravel</div>
                <div class="description">Raised $57M in Series A funding from Accel in 2023</div>
                <div class="card__link">
                    <a href="https://fortune.com/2024/09/05/laravel-raises-57-million-series-a-from-accel/">Read
                        more</a>
                </div>
            </div>
            <div class="card">
                <div class="card__image">
                    <img src="https://assets.shopware.com/media/logos/shopware_logo_blue.svg" alt="Shopware (Symfony-based)"/>
                </div>
                <div class="subtitle">Shopware (Symfony-based)</div>
                <div class="description">Secured $100M investment in 2022</div>
                <div class="card__link">
                    <a href="https://techcrunch.com/2022/02/08/shopware-an-e-commerce-platform-that-powers-100k-brands-raises-its-first-outside-funding-100m-from-paypal-and-carlyle/">Read
                        more</a>
                </div>
            </div>
            <div class="card">
                <div class="card__image">
                    <img src="https://edmff3urfwf.exactdn.com/app/themes/spryker-website/dist/Components/NavigationFooter/Assets/logo-9dc549614a.svg" alt="Spryker"/>
                </div>
                <div class="subtitle">Spryker</div>
                <div class="description">Raised $130M in 2020</div>
                <div class="card__link">
                    <a href="https://techcrunch.com/2020/12/17/spryker-raises-130m-at-a-500m-valuation-to-provide-b2bs-with-agile-e-commerce-tools/">Read
                        more</a>
                </div>
            </div>
            <div class="card">
                <div class="card__image">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1080px-WordPress_logo.svg.png" alt="WordPress parent company Automattic"/>
                </div>
                <div class="subtitle">WordPress parent company Automattic</div>
                <div class="description">Valued at $7.5B</div>
                <div class="card__link">
                    <a href="https://thehustle.co/08202021-automattic">Read more</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block">
    <div class="title">What You Can Build with PHP</div>

    <div class="cards cards--3">
        <div class="card">
            <div class="card__title">Websites and Web Applications</div>
            <div class="card__body">
                <p>PHP offers developers a robust and versatile platform for building dynamic and scalable web
                    applications, empowered by its intuitive syntax, extensive libraries, and vibrant community support.
                    Laravel and Symfony stand as premier choices for building web applications, offering developers
                    robust
                    frameworks equipped with modern features, elegant design patterns, and comprehensive documentation
                    to
                    streamline development and ensure scalability and maintainability.</p>
            </div>
        </div>
        <div class="card">
            <div class="card__title">Frontend</div>
            <div class="card__body">
                <p>We should add a sentence, or even a full section about "frontend" tools like Laravel Livewire and
                    Symfony Turbo and their benefits (UX as good as with JS heavy frameworks, easier to develop and to
                    maintain, better cache dynamics...). These tools are a large part of what makes PHP relevant
                    again.</p>
                <p>I would also mention how these tools are part of the "no build" movement (Symfony AssetMapper
                    etc).</p>
            </div>
        </div>
        <div class="card">
            <div class="card__title">Data Processing</div>
            <div class="card__body">
                <p>PHP offers a powerful suite of data processing tools, enabling developers to manipulate and analyze
                    data efficiently with its extensive libraries and functions. Leveraging PHP's intuitive syntax and
                    seamless integration with databases, developers can tackle complex data processing tasks
                    effectively, empowering them to extract valuable insights and drive informed decision-making
                    processes.</p>
            </div>
        </div>
        <div class="card">
            <div class="card__title">High-load Services</div>
            <div class="card__body">
                <p>PHP excels in high-load environments and scales effortlessly:</p>
                <ul>
                    <li>Powers some of the world's busiest websites</li>
                    <li>Designed as share-nothing architecture and scales horizontally out of the box.</li>
                    <li>Serverless by design and runs successfully on AWS Lambda (Bref: https://bref.sh/).</li>
                    <li>Good for microservices in conjunction with powerful application servers.</li>
                    <li>Perfect for “No PaaS Required” scenarios allowing you to save costs.</li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card__title">APIs</div>
            <div class="card__body">
                <p>PHP stands as a reliable choice for developing APIs, offering a wealth of features and libraries such
                    as <a href="https://api-platform.com">API Platform</a> to streamline the process while ensuring
                    scalability and security. With its
                    extensive community support and seamless integration with databases and web servers, PHP empowers
                    developers to create robust APIs that facilitate smooth communication between applications and
                    enable efficient data exchange across platforms.</p>
            </div>
        </div>
        <div class="card">
            <div class="card__title">E-commerce</div>
            <div class="card__body">
                <p>PHP dominates the e-commerce space:</p>
                <ul>
                    <li>Powers platforms like WooCommerce, PrestaShop, Shopware, Adobe Commerce, and OpenMage.</li>
                    <li>Offers robust security features for handling sensitive data.</li>
                    <li>Integrates easily with payment gateways and shipping APIs.</li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card__title">AI and Machine Learning</div>
            <div class="card__body">
                <p>PHP integrates well with AI and ML technologies:</p>
                <ul>
                    <li>Interfaces with popular ML libraries through extensions</li>
                    <li>Supports data preprocessing and feature engineering</li>
                    <li>Enables deployment of ML models in web applications</li>
                    <li>Facilitates integration with cloud-based AI services</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="block">
    <div class="block__intro">
        <div class="title">Who Develops PHP</div>
        <div class="description">PHP's development is driven by a passionate community:</div>
    </div>
    <div class="block__body">
        <div class="cards cards--2">
            <div class="card">
                <div class="card__image">
                    <img src="https://thephp.foundation/assets/icons/php_foundation.svg" alt="The PHP Foundation"/>
                </div>
                <div class="subtitle"><a href="https://thephp.foundation/">The PHP Foundation</a></div>
                <div class="description">Ensures PHP's long-term sustainability.</div>
            </div>
            <div class="card">
                <div class="card__image">
                    <img src="https://cdn3.iconfinder.com/data/icons/say-no-to-war-2/32/court-courthouse-building-judicial-institution-office-government-512.png" alt="Corporate Sponsors"/>
                </div>
                <div class="subtitle">Corporate Sponsors</div>
                <div class="description">
                    PHP is funded by corporate <a href="#">sponsors</a> and <a href="#">governments</a>.
                </div>
            </div>
            <div class="card">
                <div class="card__image">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1422px-PHP-logo.svg.png" alt="PHP Internals"/>
                </div>
                <div class="subtitle">PHP Internals</div>
                <div class="description">Core developers who shape the language's future.</div>
            </div>
            <div class="card">
                <div class="card__image">
                    <img src="https://cdn3.iconfinder.com/data/icons/fluent-solid-24px-vol-5/24/ic_fluent_people_community_24_filled-512.png" alt="More than XXX global community"/>
                </div>
                <div class="subtitle">More than XXX global community</div>
                <div class="description">Many contributors and maintainers are volunteering.</div>
            </div>
        </div>

        <div class="cta">
            By choosing PHP, you're selecting a mature, versatile, and well-supported language that
            powers a significant portion of the web and continues to evolve to meet modern development needs.
        </div>
    </div>
</div>

<?php site_footer(); ?>
