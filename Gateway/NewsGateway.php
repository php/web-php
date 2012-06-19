<?php

interface NewsGateway {

    /**
     * @abstract
     * @param int $max [optional]
     * @return Traversable
     */
    function getLatestArticles($max = 5);

    /**
     * @abstract
     * @param Traversable $categories
     * @param int $limit [optional]
     * @return Traversable
     */
    function getArticlesForCategories(Traversable $categories, $limit = 5);

}
