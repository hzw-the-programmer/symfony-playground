<?php

namespace AppBundle\Tests\Controller;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @dataProvider getPublicUrls
     */
    public function testPublicUrls($url)
    {
        $client = static::createClient();
        $client->request('GET', $url);

        $this->assertTrue(
            $client->getResponse()->isSuccessful(),
            sprintf('The %s public URL loads correctly.', $url)
        );
    }

    /**
     * @dataProvider getSecureUrls
     */
    public function testSecureUrls($url)
    {
        $client = static::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isRedirect());

        $this->assertEquals(
            'http://localhost/en/login',
            $client->getResponse()->getTargetUrl(),
            sprintf('The %s secure URL redirects to the login form.', $url)
        );
    }

    public function getPublicUrls()
    {
        return array(
            array('/'),
            array('/en/blog/'),
            array('/en/blog/posts/morbi-tempus-commodo-mattis'),
            array('/en/login'),
        );
    }

    public function getSecureUrls()
    {
        return array(
            array('/en/admin/post/'),
            array('/en/admin/post/new'),
            array('/en/admin/post/1'),
            array('/en/admin/post/1/edit'),
        );
    }
}

