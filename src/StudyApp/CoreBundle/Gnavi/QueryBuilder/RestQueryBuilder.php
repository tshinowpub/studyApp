<?php

namespace StudyApp\CoreBundle\Gnavi\QueryBuilder;

class RestQueryBuilder implements QueryBuilderInterface
{

    private $query;
    private $format;

    public function setCriteria($criteria)
    {
        $query = array(
            'format' => 'json',
        );

        if(isset($criteria['input_coordinates_mode'])) {
            $query['input_coordinates_mode'] = $criteria['input_coordinates_mode'];
        }

        if(isset($criteria['coordinates_mode'])) {
            $query['coordinates_mode'] = $criteria['coordinates_mode'];
        }

        if(isset($criteria['latitude'])) {
            $query['latitude'] = $criteria['latitude'];
        }

        if(isset($criteria['longitude'])) {
            $query['longitude'] = $criteria['longitude'];
        }

        if(isset($criteria['range'])) {
            $query['range'] = $criteria['range'];
        }

        $this->query = $query;

        return $this;
    }

    public function buildQuery()
    {
        return http_build_query($this->query);
    }

    public function setFormat($format = 'json')
    {
        $this->format = $format;

        return $this;
    }
}
