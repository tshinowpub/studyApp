<?php

namespace StudyApp\CoreBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DashboardController {

    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function dashboardAction ()
    {
        return new Response(
            '<html><body>test</body></html>'
        );
    }

}
