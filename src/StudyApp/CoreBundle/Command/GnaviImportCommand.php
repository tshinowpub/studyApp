<?php

namespace StudyApp\CoreBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use StudyApp\Domain\Gnavi\Entity\Rest;
use StudyApp\Domain\Gnavi\QueryBuilder\RestQueryBuilder;

class GnaviImportCommand extends ContainerAwareCommand
{

    const BASE_URL = 'https://api.gnavi.co.jp/RestSearchAPI/20150630/';

    protected function configure()
    {
        $this
            ->setName('gnavi:import');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $queryBuilder = new RestQueryBuilder();
        $queryBuilder->setQueryFromCriteria(
            array(
                'input_coordinates_mode' => 1,
                'coordinates_mode' => 1,
                'latitude' => 34.6952161,
                'longitude' => 135.5015264,
                'range' => 3
            )
        );

        $gnaviApiService =
            $this->getContainer()->get('study_app.domain.gnavi.service.api.service');

        $response = $gnaviApiService
            ->setUrl(self::BASE_URL)
            ->setQueryBuilder($queryBuilder)
            ->execute();

        $apiRests = [];
        if($response->getStatusCode() == '200') {
            $json = $response->getBody();
            $apiData = json_decode($json);

            $apiRests = $apiData->rest;
        }

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        foreach($apiRests as $apiRest) {
            $rest = $this->createRest($apiRest);
        }

        $em->flush();

        $output->writeln('complete');
    }

    private function createRest($apiRest)
    {
        $rest = new Rest();

        $rest
            ->setGnaviId($apiRest->id)
            ->setName($apiRest->name)
            ->setNameKana($apiRest->name_kana)
            ->setTel($apiRest->tel)
            ->setAddress($apiRest->address)
            ;

        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $em->persist($rest);
    }

}
