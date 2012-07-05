<?php

class NewsItem {

    /**
     * @var string
     */
    protected $permanentUrl;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $published;

    /**
     * @var DateTime
     */
    protected $updated;

    /**
     * @var array
     */
    protected $category = array();

    /**
     * @var array
     */
    protected $link = array();

    /**
     * @var string
     */
    protected $content = '';

    /**
     * @var string
     */
    protected $newsImage;

    /**
     * @var string
     */
    protected $intro  = '';


    /**
     * @param string $title
     * @param string $permanentUrl
     * @param string $published
     * @param string $updated
     * @param array $category
     * @param array $link
     * @param string $content
     * @param string $newsImage
     * @param string $intro
     */
    function __construct($title, $permanentUrl, $published, $updated, $category, $link, $content, $newsImage = NULL, $intro = '') {
        $this->title = $title;
        $this->permanentUrl = $permanentUrl;
        $this->published = $published;
        $this->updated = new DateTime($updated);
        $this->category = $category;
        $this->link = $link;
        $this->content = $content;
        $this->newsImage = $newsImage;
        $this->intro = $intro;
    }

    /**
     * @return array
     */
    public function getCategories() {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getId() {
        return parse_url($this->getPermanentUrl(), PHP_URL_FRAGMENT);
    }

    /**
     * @return string
     */
    public function getPermanentUrl() {
        return $this->permanentUrl;
    }

    /**
     * @return array
     */
    public function getLink() {
        return $this->link;
    }

    public function getNewsImage() {
        return $this->newsImage;
    }

    /**
     * @return DateTime
     */
    public function getPublishedDate() {
        return new DateTime($this->published);
    }

    /**
     * @return string
     */
    public function getPublishedString() {
        return $this->published;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedDate() {
        return $this->updated;
    }

    /**
     * @param $category
     * @return bool
     */
    public function hasCategory($category) {
        foreach ($this->category as $cat) {
            if ($cat['term'] === $category) {
                return true;
            }
        }
        return false;
    }

    public function getIntroduction() {
        return $this->intro;
    }

}
