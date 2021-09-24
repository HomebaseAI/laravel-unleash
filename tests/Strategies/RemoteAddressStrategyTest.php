<?php

namespace MikeFrancis\LaravelUnleash\Tests\Strategies;

use Illuminate\Http\Request;
use MikeFrancis\LaravelUnleash\Strategies\RemoteAddressStrategy;
use PHPUnit\Framework\TestCase;

class RemoteAddressStrategyTest extends TestCase
{
    public function testWithRemoteAddress()
    {
        $params = [
            'remoteAddress' => '1.1.1.1,2.2.2.2',
        ];
        $constraints = [];

        $request = $this->createMock(Request::class);
        $request->expects($this->once())->method('ip')->willReturn('1.1.1.1');

        $strategy = new RemoteAddressStrategy();

        $this->assertTrue($strategy->isEnabled($params, $constraints, $request));
    }

    public function testWithInvalidRemoteAddress()
    {
        $params = [
            'remoteAddress' => '1.1.1.1,2.2.2.2',
        ];
        $constraints = [];

        $request = $this->createMock(Request::class);
        $request->expects($this->once())->method('ip')->willReturn('1.1.1.2');

        $strategy = new RemoteAddressStrategy();

        $this->assertFalse($strategy->isEnabled($params, $constraints, $request));
    }

    public function testWithoutRequestIP()
    {
        $params = [
            'remoteAddress' => '1.1.1.1,2.2.2.2',
        ];
        $constraints = [];

        $request = $this->createMock(Request::class);
        $request->expects($this->once())->method('ip')->willReturn(null);

        $strategy = new RemoteAddressStrategy();

        $this->assertFalse($strategy->isEnabled($params, $constraints, $request));
    }

    public function testWithoutRemoteAddressParameters()
    {
        $params = [];
        $constraints = [];

        $request = $this->createMock(Request::class);
        $request->expects($this->never())->method('ip');

        $strategy = new RemoteAddressStrategy();

        $this->assertFalse($strategy->isEnabled($params, $constraints, $request));
    }
}
