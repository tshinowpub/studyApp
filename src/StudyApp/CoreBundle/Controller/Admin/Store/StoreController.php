<?php

namespace StudyApp\CoreBundle\Controller\Admin\Store;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use GuzzleHttp\Client;

class StoreController {

    const BASE_URL = 'https://api.gnavi.co.jp/RestSearchAPI/20150630/';

    /**
     * @Route("/admin/store")
     */
    public function indexAction ()
    {
        return new Response(
            '<html><body>index</body></html>'
        );
    }

    /**
     * @Route("/admin/store/search")
     */
    public function searchAction ()
    {
        return new Response(
            '<html><body>search</body></html>'
        );
    }

    /**
     * @Route("/admin/store/api")
     * @Template("StudyAppCoreBundle:Admin/Store:api.html.twig")
     */
    public function apiAction()
    {
        $client = new Client();

        $response = $client->request('GET', self::BASE_URL, [
            'verify' => false,
            'query' => [
                'keyid' => '',
                'format' => 'json',
            ]
        ]);

        $stores = [];
        if($response->getStatusCode() == '200') {
            $json = $response->getBody();
            $stores = $this->decodeStoreDataByJson($json);
        }

        return [];
    }

    private function decodeStoreDataByJson($json)
    {
        $stores = json_decode($json);

        return $stores;
    }

}
