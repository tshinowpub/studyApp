<?php

namespace StudyApp\CoreBundle\Controller\Admin\Gnavi;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Parser;

use GuzzleHttp\Client;

use StudyApp\CoreBundle\Factory\GnaviAreaCodeManeger;

class GnaviController extends Controller
{

    const BASE_URL = 'https://api.gnavi.co.jp/RestSearchAPI/20150630/';

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
     * @Route("/admin/gnavi/api")
     * @Template("StudyAppCoreBundle:Admin/Store:api.html.twig")
     */
    public function apiAction()
    {
        $yaml = new Parser();

        try {
            $path = __DIR__ . '/../../../Resources/config/gnavi.yml';
            $gnaviConfig = $yaml->parse(file_get_contents($path));
        } catch (ParseException $e) {
            printf("Unable to parse the gnavi.yml string: %s", $e->getMessage());
        }

        $client = new Client();
        $response = $client->request('GET', self::BASE_URL, [
            'verify' => false,
            'query' => [
                'keyid' => $gnaviConfig['gnavi']['keyid'],
                'format' => 'json',
            ]
        ]);

        $stores = [];
        if($response->getStatusCode() == '200') {
            $json = $response->getBody();
            $stores = $this->decodeStoreDataByJson($json);
        }

        var_dump($stores);
        exit;

        return [];
    }

    /**
     * @Route("/admin/gnavi/area/{type}")
     * @Template("StudyAppCoreBundle:Admin/Store:api.html.twig")
     */
    public function areaMasterAction($type)
    {
        $gnaviAreaCodeManeger = $this->get('study_app.factory.gnavi.area.code.maneger');
        $areaCodeManager = $gnaviAreaCodeManeger->getAreaCodeManager('S');
    }

    private function decodeStoreDataByJson($json)
    {
        $stores = json_decode($json);

        return $stores;
    }

}
