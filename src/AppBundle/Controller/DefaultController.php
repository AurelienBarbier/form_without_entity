<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ContactType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);


        // Les donnees de notre requete sont interpretees.
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //On recupere les donnees
            $data = $form->getData();

            // Puis on traite la donnée (envoi de mail…)
            // Apres avoir configure les paramtre du SMTP
            $message = \Swift_Message::newInstance()
            ->setSubject($data['subject'])
            ->setFrom($data['email'])
            ->setTo('admin@example.com')
            ->setBody(
                $data['message'],
                'text/html'
            );

            $mailer->send($message);
        }


        return $this->render('default/index.html.twig', [
        'contact_form' => $form->createView(),
        'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
