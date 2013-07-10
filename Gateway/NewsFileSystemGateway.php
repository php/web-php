<?php

require_once dirname(__FILE__) . '/../Entity/NewsItem.php';
require_once dirname(__FILE__) . '/NewsGateway.php';

class NewsFileSystemGateway implements NewsGateway {

    /**
     * @var array
     */
    protected $articles;

    public function __construct() {

        $NEWS_ENTRIES = array();

        //will overwrite $NEWS_ENTRIES.
        require __DIR__ . '/../include/pregen-news.inc';

        $this->articles = array();

        foreach ($NEWS_ENTRIES as $article) {
            $this->articles[] = new NewsItem(
                $article['title'],
                $article['id'],
                $article['published'],
                $article['updated'],
                $article['category'],
                $article['link'],
                $article['content'],
                isset($article['newsImage']) ? $article['newsImage'] : NULL,
                isset($article['intro']) ? $article['intro'] : $article['content']
            );
        }

    }

    /**
     * @param int $max [optional]
     * @return array
     */
    public function getLatestArticles($max = 5) {
        return array_slice($this->articles, 0, $max);
    }

    /**
     * @param array $categories
     * @param int $limit
     * @return array
     */
    public function getArticlesForCategories(array $categories, $limit = 5) {
        $result = array();

        foreach ($this->articles as $item) {
            /**
             * @var NewsItem $item
             */
            $articleCategories = array();

            foreach ($categories as $category) {
                if ($item->hasCategory($category)) {
                    $result[] = $item;
                }
            }

        }

        return array_slice($result, 0 , $limit);

    }

}
