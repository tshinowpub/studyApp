<?php

namespace StudyApp\CoreBundle\Gnavi\QueryBuilder;

interface QueryBuilderInterface
{
    public function setCriteria($criteria);

    public function buildQuery();

    public function setFormat($format = 'json');
}
