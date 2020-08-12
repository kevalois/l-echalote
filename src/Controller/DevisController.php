<?php

namespace App\Controller;


use App\Form\DevisType;
use App\Entity\Evenement;
use App\Entity\TypeEvenement;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevisController extends AbstractController
{
    /**
     * @Route("/devis", name="devis")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {

        $form = $this->createForm(DevisType::class);
        //dd($form);
        $form->handleRequest($request);

        //dd($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $devis = $form->getData();

            $donne = $form['donne']->getData();

            if($donne === true) {
            // Ici nous enverrons l'e-mail
                $message = (new \Swift_Message('Demande de devis'))
                
                    // On attribue l'expéditeur
                    ->setFrom($devis['email'])

                    // On attribue le destinataire
                    ->setTo('echalote@kevalois.fr')

                    // On crée le texte avec la vue
                    ->setBody(
                        $this->renderView(
                            'emails/devis.html.twig', compact('devis')
                        ),
                        'text/html'
                    )
                ;

                $mailer->send($message);

                $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
            }
            else {
                $this->addFlash('message', 'Veuillez cocher la demande d\'utilisation des donnée. Merci');
            }

            return $this->redirectToRoute('devis');
        }
        
        return $this->render('accueil/devis.html.twig',['devisForm' => $form->createView()]);
    }
}
