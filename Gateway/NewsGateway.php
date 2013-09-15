<?php

interface NewsGateway {

    /**
     * @abstract
     * @param int $max [optional]
     * @return array
     */
    function getLatestArticles($max = 5);

    /**
     * @abstract
     * @param array $categories
     * @param int $limit [optional]
     * @return array
     */
    function getArticlesForCategories(array $categories, $limit = 5);

}
