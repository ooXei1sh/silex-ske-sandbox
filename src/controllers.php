<?php

use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/', function () use ($app) {
    $app['session']->getFlashBag()->add('warning', 'Warning flash message');
    $app['session']->getFlashBag()->add('info', 'Info flash message');
    $app['session']->getFlashBag()->add('success', 'Success flash message');
    $app['session']->getFlashBag()->add('danger', 'Error flash message');

    return $app['twig']->render('index.html.twig');
})->bind('homepage');

$app->match('/login', function (Request $request) use ($app) {
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

    return $app['twig']->render('login.html.twig', array(
        'form'  => $form->createView(),
        'error' => $app['security.last_error']($request),
    ));
})->bind('login');

$app->match('/doctrine', function () use ($app) {
    return $app['twig']->render(
        'doctrine.html.twig',
        array(
            'posts' => $app['db']->fetchAll('SELECT * FROM post')
        )
    );
})->bind('doctrine');

$app->match('/form', function (Request $request) use ($app) {

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

    return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
})->bind('form');

$app->match('/logout', function () use ($app) {
    $app['session']->clear();

    return $app->redirect($app['url_generator']->generate('homepage'));
})->bind('logout');

$app->get('/page-with-cache', function () use ($app) {
    $response = new Response($app['twig']->render('page-with-cache.html.twig', array('date' => date('Y-M-d h:i:s'))));
    $response->setTtl(10);

    return $response;
})->bind('page_with_cache');

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message, $code);
});

return $app;
