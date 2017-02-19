<?php

namespace StudyApp\CoreBundle\Controller\Admin\Gnavi;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Parser;

use GuzzleHttp\Client;

use StudyApp\Domain\Gnavi\QueryBuilder\RestQueryBuilder;

class GnaviController extends Controller
{

    const BASE_URL = 'https://api.gnavi.co.jp/RestSearchAPI/20150630/';

    const COORDINATES_MODE = 1;

    /**
     * @Route("/admin/gnavi")
     */
    public function indexAction ()
    {
        return new Response(
            '<html><body>index</body></html>'
        );
    }

    /**
     * @Route("/admin/gnavi/search")
     */
    public function searchAction ()
    {
        return new Response(
            '<html><body>search</body></html>'
        );
    }

    /**
     * @Route("/admin/gnavi/api/import", name="admin_gnavi_api_import")
     * @Template("StudyAppCoreBundle:Admin/Gnavi:import.html.twig")
     */
    public function apiImportAction()
    {
        $criteria = [
            'input_coordinates_mode' => self::COORDINATES_MODE,
            'coordinates_mode' => self::COORDINATES_MODE,
            'latitude' => 34.6952161,
            'longitude' => 135.5015264,
            'range' => 3
        ];

        $restQueryBuilder = new RestQueryBuilder();
        $restQueryBuilder->setQueryFromCriteria($criteria);

        $gnaviApiService = $this->get('study_app.domain.gnavi.service.api.service');
        $response = $gnaviApiService
            ->setUrl(self::BASE_URL)
            ->setQueryBuilder($restQueryBuilder)
            ->execute();

        $stores = [];
        if($response->getStatusCode() == '200') {
            $json = $response->getBody();
            $stores = $this->decodeStoreDataByJson($json);
        }

/**
        var_dump($stores);
        exit;
**/
        return [
            'stores' => $stores->rest,
        ];
    }

    private function decodeStoreDataByJson($json)
    {
        $stores = json_decode($json);

        return $stores;
    }

}
