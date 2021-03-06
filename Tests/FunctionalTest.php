<?php

namespace KnpU\OAuth2ClientBundle\Tests;

use KnpU\OAuth2ClientBundle\DependencyInjection\Configuration;
use KnpU\OAuth2ClientBundle\Tests\app\TestKernel;
use Symfony\Component\Config\Definition\Processor;

class FunctionalTest extends \PHPUnit_Framework_TestCase
{
    public function testServicesAreUsable()
    {
        $kernel = new TestKernel('dev', true);
        $kernel->boot();
        $container = $kernel->getContainer();
        $this->assertTrue($container->has('knpu.oauth2.my_facebook_client'));

        $fbProvider = $container->get('knpu.oauth2.my_facebook_client');
        $this->assertInstanceOf('League\OAuth2\Client\Provider\Facebook', $fbProvider);
    }
}
