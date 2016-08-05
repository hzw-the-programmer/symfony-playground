<?php

namespace AppBundle\Tests\Controller\Admin;

class BlogControllerTest extends WebTestCase
{
    public function testRegularUsersCannotAccessToTheBackend()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'john_user',
            'PHP_AUTH_PW' => 'kitten',
        ));

        $client->request('GET', '/en/admin/post/');

        $this->assertEquals(Response::HTTP_FORBIDDEN, $client->getResponse()->getStatusCode());
    }

    public function testAdministratorUsersCanAccessToBackend()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'anna_admin',
            'PHP_AUTH_PW' => 'kitten',
        ));

        $client->request('GET', '/en/admin/post/');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testIndex()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'anna_admin',
            'PHP_AUTH_PW' => 'kitten',
        ));

        $crawler = $client->request('GET', '/en/admin/post/');

        $this->assertCount(
            30,
            $crawler->filter('body#admin_post_index #main tbody tr'),
            'The backend homepage displays all the available posts.'
        );
    }
}

