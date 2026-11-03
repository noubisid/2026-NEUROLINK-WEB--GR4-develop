<?php

namespace Controller;

use Entity\Medecin;
use Repository\MedecinRepository;
use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\Controller\Route;
use Studoo\EduFramework\Core\View\TwigCore;
class MedecinController implements ControllerInterface
{
    public function execute(Request $request): string|null
    {
        if ($request->getHttpMethod() === "POST") {
            $id = (int) $request->get('id');
            $medecin = new Medecin(
                $id,
                $request->get('nom'),
                $request->get('prenom'),
                $request->get('email'),
                $request->get('password')
            );

            $medecinRepository = new MedecinRepository();
            if ($id > 0) {
                $medecinRepository->updateMedecin($medecin);
            } else {
                $medecinRepository->createMedecin($medecin);
            }

            $route = new Route();
            header('Location: ' . $route->getNameToPath('medecin'));
            return null;
        }

        $medecinRepository = new MedecinRepository();

        return TwigCore::getEnvironment()->render('medecin/medecin.html.twig',
            [
                "titre" => 'MedecinController',
                "request" => $request,
                "medecinId" => $request->get('id'),
                "medecins" => $medecinRepository->getMedecins()
            ]
        );
    }
}