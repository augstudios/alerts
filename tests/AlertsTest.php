<?php

use Augstudios\Alerts\Alerts;
use Mockery as m;

class AlertsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Mockery\Mock|Augstudios\Alerts\AlertsStore
     */
    protected $store;

    /**
     * @var Augstudios\Alerts\Alerts
     */
    protected $alerts;

    /**
     * setup for testing
     */
    public function setUp()
    {
        $this->store = m::mock('Augstudios\Alerts\AlertsStore');
        $this->alerts = new Alerts($this->store);
    }

    /** @test */
    public function it_adds_alerts()
    {
        $this->store
            ->shouldReceive('flash')
            ->with('Testing adding alerts!', 'info')
            ->andReturnSelf();

        $result = $this->alerts->flash('Testing adding alerts!', 'info');

        $this->assertSame($this->alerts, $result);
    }

    /** @test */
    public function it_adds_success_alerts()
    {
        $this->store
            ->shouldReceive('flash')
            ->with('Testing adding success alerts!', 'success')
            ->andReturnSelf();

        $result = $this->alerts->flashSuccess('Testing adding success alerts!');

        $this->assertSame($this->alerts, $result);
    }

    /** @test */
    public function it_adds_danger_alerts()
    {
        $this->store
            ->shouldReceive('flash')
            ->with('Testing adding danger alerts!', 'danger')
            ->andReturnSelf();

        $result = $this->alerts->flashDanger('Testing adding danger alerts!');

        $this->assertSame($this->alerts, $result);
    }

    /** @test */
    public function it_adds_warning_alerts()
    {
        $this->store
            ->shouldReceive('flash')
            ->with('Testing adding warning alerts!', 'warning')
            ->andReturnSelf();

        $result = $this->alerts->flashWarning('Testing adding warning alerts!');

        $this->assertSame($this->alerts, $result);
    }

    /** @test */
    public function it_adds_info_alerts()
    {
        $this->store
            ->shouldReceive('flash')
            ->with('Testing adding info alerts!', 'info')
            ->andReturnSelf();

        $result = $this->alerts->flashInfo('Testing adding info alerts!');

        $this->assertSame($this->alerts, $result);
    }

    /** @test */
    public function it_gets_alerts(){
        $this->store
            ->shouldReceive('prior')
            ->andReturn(Illuminate\Support\Collection::make());

        $result = $this->alerts->all();

        $this->assertInstanceOf('Illuminate\Support\Collection', $result);
    }

    /** @test */
    public function it_gets_alerts_by_type(){
        $type = Augstudios\Alerts\AlertType::Info;

        $this->store
            ->shouldReceive('priorOfType')
            ->with($type)
            ->andReturn(Illuminate\Support\Collection::make());

        $result = $this->alerts->ofType($type);

        $this->assertInstanceOf('Illuminate\Support\Collection', $result);
    }
}
