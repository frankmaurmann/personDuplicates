<?php

namespace App\Controller;

use App\Entity\Person;
use App\Repository\GemeindepersonRepository;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CheckPersonController extends AbstractController
{
    #[Route('/dubletten', name: 'app_check_duplicates')]
    public function index(
        GemeindepersonRepository $gemeindepersonRepository,
        PersonRepository         $personRepository,
        Request                  $request
    ): JsonResponse
    {
        $parameters = $request->query->all();
        $duplicateFields = [];

        if (isset($parameters['fields'])) {
            $fields = explode(',', $parameters['fields']);
            foreach ($fields as $field) {
                if (in_array($field, GemeindepersonRepository::ALLOWED_FILTER_VALUES)) {
                    $duplicateFields[] = $field;
                }
            }
        }

        $duplicateFields = array_unique(array_merge(GemeindepersonRepository::ALLOWED_FILTER_DEFAULT_VALUES, $duplicateFields));
        $duplicates = $gemeindepersonRepository->getDuplicates($duplicateFields);
        $jsonData = [
            'meta' => [
                'dublettenParameter' => $duplicateFields,
            ]
        ];
        foreach ($duplicates as $data) {

            if (!isset($data[0])) {
                continue;
            }

            /** @var Person $duplicatePerson */
            $duplicatePersons = $personRepository->findByNameFields($duplicateFields, $data[0]);

            $duplicateData = [];
            foreach ($duplicatePersons as $duplicatePerson) {
                $duplicateData[] = [
                    'Id' => $duplicatePerson->getId(),
                    'Name' => $duplicatePerson->getName(),
                    'Vorname' => $duplicatePerson->getVorname(),
                    'Strasse' => $duplicatePerson->getStrasse(),
                    'Plz' => $duplicatePerson->getPlz(),
                    'Ort' => $duplicatePerson->getOrt(),
                    'Erstellungsdatum' => $duplicatePerson->getCreatedate()->format('d.m.Y H:i:s')
                ];
            }

            $jsonData['dubletten'][] =
                [
                    'Dublettenanzahl' => $data[1],
                    'Dubletten' => $duplicateData
                ];
        }

        return new JsonResponse($jsonData);
    }
}
