<?php

namespace StudyApp\Domain\Api\Service;

interface QueryBuilderInterface
{
    public function setQueryFromCriteria($criteria);
    public function getQuery();
    public function buildQuery();
}
