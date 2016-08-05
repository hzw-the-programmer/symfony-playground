<?php

namespace AppBundle\Tests\Controller;

class BlogControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/en/blog/');

        $this->assertCount(
            Post::NUM_ITEMS,
            $crawler->filter('article.post'),
            'The homepage displays the right number of posts.'
        );
    }
}

