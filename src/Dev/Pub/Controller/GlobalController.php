<?php

namespace Dev\Pub\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalController
{
    public function indexAction(Application $app, Request $request)
    {
        $app['session']->getFlashBag()->add('warning', 'Warning flash message');
        $app['session']->getFlashBag()->add('info', 'Info flash message');
        $app['session']->getFlashBag()->add('success', 'Success flash message');
        $app['session']->getFlashBag()->add('danger', 'Error flash message');

        return new Response($app['twig']->render('index.html.twig'));
    }

    public function cacheAction(Application $app, Request $request)
    {
        $response = new Response($app['twig']->render('page-with-cache.html.twig', array('date' => date('Y-M-d h:i:s'))));
        $response->setTtl(10);
        return $response;
    }

    public function formAction(Application $app, Request $request)
    {
        $em = $app['orm.em'];

        $entity = new \Dev\Pub\Entity\Form();

        // $entity = $em->getRepository('\Dev\Pub\Entity\Form')
        //     ->findOneBy(array(
        //         'id' => 1
        //     ));

        // if(!$entity){
        //     throw new \Exception('Record not found.');
        // }

        $form = $app['form.factory']->create(new \Dev\Pub\Form\FormType(), $entity);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();
            $app['session']->getFlashBag()->add('success', 'The form is valid');
        }

        return new Response($app['twig']->render('form.html.twig', array(
            'form' => $form->createView(),
        )));
    }

    public function doctrineAction(Application $app, Request $request)
    {
        return new Response($app['twig']->render('doctrine.html.twig',array(
            'posts' => $app['db']->fetchAll('SELECT * FROM form')
        )));
    }

    public function loginAction(Application $app, Request $request)
    {
        $form = $app['form.factory']->createBuilder('form')
            ->add(
                'username',
                'text',
                array(
                    'label' => 'Username',
                    'data' => $app['session']->get('_security.last_username')
                )
            )
            ->add('password', 'password', array('label' => 'Password'))
            ->getForm()
        ;

        return new Response($app['twig']->render('login.html.twig', array(
            'form'  => $form->createView(),
            'error' => $app['security.last_error']($request),
        )));
    }

    public function logoutAction(Application $app, Request $request)
    {
        $app['session']->clear();
        return $app->redirect($app['url_generator']->generate('homepage'));
    }
}
