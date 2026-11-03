<?php

namespace Controller;

use Entity\Medecin;
use Repository\MedecinRepository;
use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\Controller\Route;
use Studoo\EduFramework\Core\View\TwigCore;

class MedecinUpdateController implements ControllerInterface
{
    public function execute(Request $request): string|null
    {
        $medecinRepository = new MedecinRepository();
        $id = filter_var($request->get('id'), FILTER_VALIDATE_INT);

        if ($id === false || $id === null) {
            header('Location: ' . new Route()->getNameToPath('medecin'));
            return null;
        }

        if ($request->getHttpMethod() === "POST") {
            $medecin = new Medecin(
                $id,
                $request->get('nom'),
                $request->get('prenom'),
                $request->get('email'),
                $request->get('password')
            );

            $medecinRepository->updateMedecin($medecin);

            header('Location: ' . new Route()->getNameToPath('medecin'));
            return null;
        }

        $medecin = $medecinRepository->getMedecin($id);

        if ($medecin === false) {
            header('Location: ' . new Route()->getNameToPath('medecin'));
            return null;
        }

        return TwigCore::getEnvironment()->render('medecinupdate/medecinupdate.html.twig',
            [
                'titre' => 'MedecinUpdateController',
                'request' => $request,
                'medecin' => $medecin,
            ]
        );
    }
}
