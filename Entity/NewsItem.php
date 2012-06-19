<?php

class NewsItem {

    /**
     * @var int
     */
    protected $id;

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
     * @param string $title
     * @param int $id
     * @param string $published
     * @param string $updated
     * @param array $category
     * @param array $link
     * @param string $content
     * @param string $newsImage
     */
    function __construct($title, $id, $published, $updated, $category, $link, $content, $newsImage = NULL) {
        $this->title = $title;
        $this->id = $id;
        $this->published = $published;
        $this->updated = new DateTime($updated);
        $this->category = $category;
        $this->link = $link;
        $this->content = $content;
        $this->newsImage = $newsImage;
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
     * @return mixed
     */
    public function getId() {
        return $this->id;
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

}
