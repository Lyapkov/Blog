<?php


namespace AppBundle\SearchContext\Request;

/**
 * Interface RequestInterface
 *
 * @package AppBundle\SearchContext\Request
 */
interface RequestInterface
{
    public const LIMIT_DEFAULT = 10;

    /**
     * @return mixed
     */
    public function getWhere();

    /**
     * @return array|null
     */
    public function getSort();

    /**
     * @return int
     */
    public function getPage();

    /**
     * @return int
     */
    public function getLimit();

    /**
     * @param $where
     */
    public function setWhere($where) : void;

    /**
     * @param array $sort
     */
    public function setSort($sort) : void;

    /**
     * @param int $page
     */
    public function setPage($page) : void;

    /**
     * @param int $limit
     */
    public function setLimit($limit) : void;

    /**
     * @return mixed
     */
    public function getOffset();

    /**
     * @return string
     */
    public function getSortField();

    /**
     * @return string
     */
    public function getSortDirection();
}