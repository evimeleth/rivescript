<?php

/**
 * Test the LessThanTest class.
 *
 * @package      Rivescript-php
 * @subpackage   Tests
 * @category     Conditions
 * @author       Johnny Mast <mastjohnny@gmail.com>
 */

namespace Tests\Cortex\Responses\Condition;

use Axiom\Rivescript\Rivescript;

uses()
    ->beforeEach(function () {
        $this->rivescript = new Rivescript();
        $this->rivescript->load(__DIR__.'/../../../resources/conditions/conditions.rive');
    })
    ->group('responses');

it('passes valid < condition', function () {
    $expected = "Yes that is correct.";
    $actual = $this->rivescript->reply('Would you think 2 is less then 5');

    $this->assertEquals($expected, $actual);
});

it('passes valid < condition using *', function () {
    $expected = "Yes that is correct. 31 is less than 33.";
    $actual = $this->rivescript->reply('Would you think 31 is less then 33');

    $this->assertEquals($expected, $actual);
});

it('rejects invalid < condition', function () {
    $expected = "No that is incorrect. It is the other way around 15 is greater then 5.";
    $actual = $this->rivescript->reply('Do you think 15 is less than 5');

    $this->assertEquals($expected, $actual);
});

it('rejects invalid < condition using *', function () {
    $expected = "No that is incorrect.";
    $actual = $this->rivescript->reply('Do you think 10 is less then 2');

    $this->assertEquals($expected, $actual);
});
