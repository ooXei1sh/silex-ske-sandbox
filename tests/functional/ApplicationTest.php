<?php

use Silex\Application;
use Silex\WebTestCase;

class ApplicationTest extends WebTestCase
{
    public function createApplication()
    {
        $app = new Application();

        $app['environment'] = 'test';
        require __DIR__.'/../../src/app.php';

        $app['session.test'] = true;
        require __DIR__.'/../../src/controllers.php';

        return $this->app = $app;
    }

    public function test404()
    {
        $client = $this->createClient();
        $client->request('GET', '/give-me-a-404');
        $this->assertEquals(404, $client->getResponse()->getStatusCode(), 'Crawler response status code: '.$client->getResponse()->getStatusCode());
    }

    public function testLogin()
    {
        $client = $this->createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/login');
        $this->assertTrue($client->getResponse()->isOk(), 'Crawler response status code: '.$client->getResponse()->getStatusCode());

        $node = $crawler->filter('form');
        $this->assertEquals(1, $node->count(), 'The form is missing.');

        $node = $crawler->filter('form button[type=submit]');
        $this->assertEquals(1, $node->count(), 'The form submit button is missing.');
        $buttonName = $node->text();

        $form = $crawler->selectButton($buttonName)->form();
        $crawler = $client->submit($form, array());
        $this->assertEquals(1, $crawler->filter('.alert-danger')->count());
    }

    public function testFullForm()
    {
        $client = $this->createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/form');
        $this->assertTrue($client->getResponse()->isOk(), 'Crawler response status code: '.$client->getResponse()->getStatusCode());

        $node = $crawler->filter('form');
        $this->assertEquals(1, $node->count(), 'The form is missing.');

        $node = $crawler->filter('form button[type=submit]');
        $this->assertEquals(1, $node->count(), 'The form submit button is missing.');
        $buttonName = $node->text();

        $form = $crawler->selectButton($buttonName)->form();
        $crawler = $client->submit($form);

        $this->assertGreaterThan(1, $crawler->filter('.has-error')->count());
    }

    public function testPageCache()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/page-with-cache');
        $this->assertTrue($client->getResponse()->isOk(), 'Crawler response status code: '.$client->getResponse()->getStatusCode());

        $this->assertRegExp('#This page is cached#', $crawler->filter('body')->text());
    }

    public function testLoggingWithPsrInterface()
    {
        $msg = 'Check the logger';
        $this->app['logger']->error($msg);
        $this->assertStringEndsWith(
            "app.ERROR: $msg [] []\n",
            file_get_contents(__DIR__.'/../../resources/log/app.log')
        );
    }
}
