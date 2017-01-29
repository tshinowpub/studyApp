<?php

namespace StudyApp\CoreBundle\Factory;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GnaviAreaCodeManeger implements ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getAreaCodeManager($type, $version = 'v1')
    {
        $AreaApiManeger = null;
        switch ($type) {
            case 'L':
                break;
            case 'M':
                break;
            case 'S':
                $AreaApiManeger = $this->container->get('study_app.area.master.s');
                break;
            default:
                # code...
                break;
        }

        return $AreaApiManeger;
    }

}
