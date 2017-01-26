<?php

namespace StudyApp\CoreBundle\Controller\Admin\Store;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class StoreController {

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

}
