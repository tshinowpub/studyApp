<?php

namespace StudyApp\CoreBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController {

    /**
     * @Route("/admin/home")
     */
    public function homeAction ()
    {
        return new Response(
            '<html><body>test</body></html>'
        );
    }

}
