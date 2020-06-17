<?php

namespace phpweb\news;

class Entry {
	const CATEGORIES = [
		'frontpage'   => 'PHP.net frontpage news',
		'releases'    => 'New PHP release',
		'conferences' => 'Conference announcement',
		'cfp'         => 'Call for Papers',
	];

	const WEBROOT = "https://www.php.net";
	const PHPWEB = __DIR__ . '/../';
	const ARCHIVE_FILE_REL = 'archive/archive.xml';
	const ARCHIVE_FILE_ABS = self::PHPWEB . self::ARCHIVE_FILE_REL;
	const ARCHIVE_ENTRIES_REL = 'archive/entries/';
	const ARCHIVE_ENTRIES_ABS = self::PHPWEB . self::ARCHIVE_ENTRIES_REL;
	const IMAGE_PATH_REL = 'images/news/';
	const IMAGE_PATH_ABS = self::PHPWEB . self::IMAGE_PATH_REL;


	protected $title = '';
	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}

	protected $categories = [];
	public function setCategories(array $cats): self {
		foreach ($cats as $cat) {
			if (!isset(self::CATEGORIES[$cat])) {
				throw new \Exception("Unknown category: $cat");
			}
		}
		$this->categories = $cats;
		return $this;
	}
	public function addCategory(string $cat): self {
		if (!isset(self::CATEGORIES[$cat])) {
			throw new \Exception("Unknown category: $cat");
		}
		if (!in_array($cat, $this->categories)) {
			$this->categories[] = $cat;
		}
		return $this;
	}
	public function getCategories(): array {
		return $this->categories;
	}
	public function isConference(): bool {
		return (bool)array_intersect($this->categories, ['cfp', 'conferences']);
	}

	protected $conf_time = 0;
	public function setConfTime(int $time): self {
		$this->conf_time = $time;
		return $this;
	}
	public function getConfTime(): int {
		return $this->conf_time;
	}

	protected $image = [];
	public function setImage(string $path, string $title, ?string $link): self {
		if (basename($path) !== $path) {
			throw new \Exception('path must be a simple file name under ' . self::IMAGE_PATH_REL);
		}
		if (!file_exists(self::IMAGE_PATH_ABS . $path)) {
			throw new \Exception('Image not found at web-php/' . self::IMAGE_PATH_REL . $path);
		}
		$this->image = [
			'path' => $path,
			'title' => $title,
			'link' => $link,
		];
		return $this;
	}
	public function getImage(): array {
		return $this->image;
	}

	protected $content = '';
	public function setContent(string $content): self {
		if (empty($content)) {
			throw new \Exception('Content must not be empty');
		}
		$this->content = $content;
		return $this;
	}
	public function getContent(): string {
		return $this->content;
	}

	protected $id = '';
	private static function selectNextId(): string {
		$filename = date("Y-m-d", $_SERVER["REQUEST_TIME"]);
		$count = 0;
		do {
			++$count;
			$id = $filename . "-" . $count;
			$basename  = "{$id}.xml";
		} while (file_exists(self::ARCHIVE_ENTRIES_ABS . $basename));

		return $id;
	}
	public function getId(): string {
		return $this->id;
	}

	public function save(): self {
		if (empty($this->id)) {
			$this->id = self::selectNextId();
		}

		// Create the XML document.
		$dom = new \DOMDocument("1.0", "utf-8");
		$dom->formatOutput = true;
		$dom->preserveWhiteSpace = false;
		$item = $dom->createElementNs("http://www.w3.org/2005/Atom", "entry");

		$href = self::WEBROOT . ($this->isConference() ? '/conferences/index.php' : '/index.php');
		$archive = self::WEBROOT . "/archive/" . date('Y', $_SERVER['REQUEST_TIME']) . ".php#{$this->id}";
		$link = ($this->image['link'] ?? null) ?: $archive;

		self::ce($dom, "title", $this->title, [], $item);
		self::ce($dom, "id", $archive, [], $item);
		self::ce($dom, "published", date(DATE_ATOM), [], $item);
		self::ce($dom, "updated", date(DATE_ATOM), [], $item);
		self::ce($dom, "link", null, ['href' => "{$href}#id{$this->id}", "rel"  => "alternate", "type" => "text/html"], $item);
		self::ce($dom, "link", null, ['href' => $link, 'rel'  => 'via', 'type' => 'text/html'], $item);

		if (!empty($this->conf_time)) {
			$item->appendChild($dom->createElementNs("http://php.net/ns/news", "finalTeaserDate", date("Y-m-d", $this->conf_time)));
		}

		foreach ($this->categories as $cat) {
			self::ce($dom, "category", null, ['term' => $cat, "label" => self::CATEGORIES[$cat]], $item);
		}

		if ($this->image['path'] ?? '') {
			$image = $item->appendChild($dom->createElementNs("http://php.net/ns/news", "newsImage", $this->image['path']));
			$image->setAttribute("link", $this->image['link']);
			$image->setAttribute("title", $this->image['title']);
		}

		$content = self::ce($dom, "content", null, [], $item);

		// Slurp content into our DOM.
		$tdoc = new \DOMDocument("1.0", "utf-8");
		$tdoc->formatOutput = true;
		if ($tdoc->loadXML("<div>{$this->content}    </div>")) {
			$content->setAttribute("type", "xhtml");
			$div = $content->appendChild($dom->createElement("div"));
			$div->setAttribute("xmlns", "http://www.w3.org/1999/xhtml");
			foreach($tdoc->firstChild->childNodes as $node) {
				$div->appendChild($dom->importNode($node, true));
			}
		} else {
			fwrite(STDERR, "There is something wrong with your xhtml, falling back to html");
			$content->setAttribute("type", "html");
			$content->nodeValue = $this->content;
		}

		$dom->appendChild($item);
		$dom->save(self::ARCHIVE_ENTRIES_ABS . $this->id . ".xml");

		return $this;
	}

	public function updateArchiveXML(): self {
		if (empty($this->id)) {
			throw new \Exception('Entry must be saved before updating archive XML');
		}

		$arch = new \DOMDocument("1.0", "utf-8");
		$arch->formatOutput = true;
		$arch->preserveWhiteSpace = false;
		$arch->load(self::ARCHIVE_FILE_ABS);

		$first = $arch->createElementNs("http://www.w3.org/2001/XInclude", "xi:include");
		$first->setAttribute("href", "entries/{$this->id}.xml");

		$second = $arch->getElementsByTagNameNs("http://www.w3.org/2001/XInclude", "include")->item(0);
		$arch->documentElement->insertBefore($first, $second);
		$arch->save(self::ARCHIVE_FILE_ABS);

		return $this;
	}

	private static function ce(\DOMDocument $d, string $name, $value, array $attrs = [], ?\DOMNode $to = null) {
		if ($value) {
			$n = $d->createElement($name, $value);
		} else {
			$n = $d->createElement($name);
		}
		foreach($attrs as $k => $v) {
			$n->setAttribute($k, $v);
		}
		if ($to) {
			return $to->appendChild($n);
		}
		return $n;
	}
}

