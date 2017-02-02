<?php

namespace StudyApp\CoreBundle\Gnavi\Service;

use StudyApp\CoreBundle\Gnavi\QueryBuilder\QueryBuilderInterface;

class GnaviApiService {

    private $apiConfig;
    private $queryBuilder;

    public function __construct($apiConfig)
    {
        $this->apiConfig = $apiConfig;
    }

    public function setQueryBuilder(QueryBuilderInterface $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;

        return $this;
    }

    public function getGnaviData()
    {

    }

}
