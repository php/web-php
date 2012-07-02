<?php

class HomepageNewsView {

    /**
     * @var Traversable
     */
    protected $articles;

    /**
     * @param Traversable $articles
     */
    public function __construct(Traversable $articles) {
        $this->articles = $articles;
    }

    public function render() {

        ob_start();
        ?>
        <div class='recentNewsEntries'>
            <h1><a href="/archive/">Recent News</a></h1>

            <?php
            foreach ($this->articles as $article) :
                /**
                 * @var NewsItem $article
                 */

                $id = parse_url($article->getId(), PHP_URL_FRAGMENT);
                $title = $article->getTitle();

                $publishedDate = $article->getPublishedString();
                $newsDate = $article->getPublishedDate()->format('d-M-Y');

                $content = $article->getContent();

                $permanentLink = "#" .$id;
                foreach($article->getLink() as $link) {
                    if ($link["rel"] === "via") {
                        $permanentLink = $link["href"];
                        break;
                    }
                }

                $image = "";
                $newsImage = $article->getNewsImage();
                if(isset($newsImage["link"]) && $newsImage["content"]) {
                    $image = "<a href=\"{$newsImage["link"]}\">" . $this->renderImage($newsImage) . "</a>";
                }

                $itemCategories = $article->getCategories();

                $event = '';
                if ($article->hasCategory('conferences') || $article->hasCategory('cfp')) {
                    $event = " vevent";
                }
                echo "<div class='newsItem hentry{$event}''>
                    <div class='newsImage'>{$image}</div>
                    <h2 class='summary entry-title'><a name='{$id}' id='{$id}' href='{$permanentLink}' rel='bookmark' class='bookmark'>{$title}</a></h2>
                    <div class='entry-content description'>
                        <abbr class='published newsdate' title='{$publishedDate}''>{$newsDate}</abbr>
                        {$content}
                    </div>
                </div>";
            endforeach;
            ?>

        </div>


        <?php

        return ob_get_clean();

    }

    /**
     * @param array $image
     * @return string
     */
    protected function renderImage(array $image) {
        $imageHtml = "<img src='/images/news/{$image['content']}' alt='{$image['title']}' style='float:right'";

        //getimagesize will give the HTML width and height attributes in offset 3 of the return value
        $imageDetails = @getimagesize($_SERVER['DOCUMENT_ROOT'] . '/images/news/' . $image['content']);

        if (count($imageDetails) >= 4) {
            $imageHtml .= $imageDetails[3];
        }

        $imageHtml .= "/>";

        return $imageHtml;
    }

}
