<?php
namespace VIISON\AddressSplitter\Test;

use VIISON\AddressSplitter\AddressSplitter;

/**
 * @copyright Copyright (c) 2017 VIISON GmbH
 */
class HouseNumberSplitterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validHouseNumberProvider
     *
     * @param string $houseNumber
     * @param array  $expected
     */
    public function testValidHouseNumbers($houseNumber, $expected)
    {
        self::assertSame($expected, AddressSplitter::splitHouseNumber($houseNumber));
    }

    /**
     * @return array
     */
    public function validHouseNumberProvider()
    {
        return array(
            array(
                '123',
                array(
                    'base' => '123',
                    'extension' => ''
                )
            ),
            array(
                '12A',
                array(
                    'base' => '12',
                    'extension' => 'A'
                )
            ),
            array(
                '13 B',
                array(
                    'base' => '13',
                    'extension' => 'B'
                )
            ),
            array(
                '37 HS',
                array(
                    'base' => '37',
                    'extension' => 'HS'
                )
            ),
            array(
                '  34/C',
                array(
                    'base' => '34',
                    'extension' => 'C'
                )
            ),
            array(
                '#23 C',
                array(
                    'base' => '23',
                    'extension' => 'C'
                )
            ),
            array(
                'No. 12 A',
                array(
                    'base' => '12',
                    'extension' => 'A'
                )
            ),
            array(
                'No:12/B3 ',
                array(
                    'base' => '12',
                    'extension' => 'B3'
                )
            ),
            array(
                '13/15/4/5',
                array(
                    'base' => '13',
                    'extension' => '15/4/5'
                )
            ),
        );
    }
}
