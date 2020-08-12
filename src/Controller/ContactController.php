<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $donne = $form['donne']->getData();

            if($donne === true) {
            // Ici nous enverrons l'e-mail
                $message = (new \Swift_Message('Demande de contact'))
                    // On attribue l'expéditeur
                    ->setFrom($contact['email'])

                    // On attribue le destinataire
                    ->setTo('kevalois@gmail.com')

                    // On crée le texte avec la vue
                    ->setBody(
                        $this->renderView(
                            'emails/contact.html.twig', compact('contact')
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

            return $this->redirectToRoute('contact');
        }
        
        return $this->render('accueil/contact.html.twig',['contactForm' => $form->createView()]);
    }
}
