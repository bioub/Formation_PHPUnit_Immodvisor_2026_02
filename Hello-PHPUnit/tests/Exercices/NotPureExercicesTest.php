<?php

namespace AppTests\Exercices;

use App\Exercices\NotPureExercices;
use DateTime;
use PHPUnit\Framework\TestCase;

class NotPureExercicesTest extends TestCase
{
    public function testSecondsFromNow()
    {
        $now = new DateTime('2026-02-25 14:00:00');
        $date = new DateTime('2026-02-25 14:00:10');

        $result = NotPureExercices::secondsFromNow($date, $now);

        $this->assertEquals(10, $result);
    }

    public function testSecondsFromNowNegative()
    {
        $now = new DateTime('2026-02-25 14:00:10');
        $date = new DateTime('2026-02-25 14:00:00');

        $result = NotPureExercices::secondsFromNow($date, $now);

        $this->assertEquals(-10, $result);
    }

    public function testPileOuFaceReturnsFaceWhenOne()
    {
        $this->assertEquals('face', NotPureExercices::pileOuFace(1));
    }

//    public function testPileOuFaceReturnsPileOrFaceWhenRandom()
//    {
//        $result = NotPureExercices::pileOuFace();
//        $this->assertContains($result, ['pile', 'face']);
//    }
}
