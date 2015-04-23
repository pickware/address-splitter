<?php
use VIISON\AddressSplitter\AddressSplitter;

class AddressSplitterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider addressProvider
     * @param string $address
     * @param array  $expected
     */
    public function test($address, $expected)
    {
        $this->assertSame($expected, AddressSplitter::splitAddress($address));
    }

    public function addressProvider()
    {
        return array(
            array(
                '56, route de Genève',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'route de Genève',
                    'houseNumber'        => '56',
                    'additionToAddress2' => ''

                )
            ),
            array(
                "Piazza dell'Indipendenza 14",
                array(
                    'additionToAddress1' => '',
                    'streetName'         => "Piazza dell'Indipendenza",
                    'houseNumber'        => '14',
                    'additionToAddress2' => ''

                )
            ),
            array(
                "Neuhof 13/15",
                array(
                    'additionToAddress1' => '',
                    'streetName'         => "Neuhof",
                    'houseNumber'        => '13/15',
                    'additionToAddress2' => ''

                )
            ),
            array(
                "574 E 10th Street",
                array(
                    'additionToAddress1' => "",
                    'streetName'         => "E 10th Street",
                    'houseNumber'        => "574",
                    'additionToAddress2' => ""
                )
            ),
            array(
                "1101 Madison St # 600",
                array(
                    'additionToAddress1' => "",
                    'streetName'         => "Madison St",
                    'houseNumber'        => "1101",
                    'additionToAddress2' => "# 600"
                )
            ),
            array(
                "Apenrader Str. 16 / Whg. 3",
                array(
                    'additionToAddress1' => "",
                    'streetName'         => "Apenrader Str.",
                    'houseNumber'        => "16",
                    'additionToAddress2' => "Whg. 3"
                )
            ),
            array(
                "Wiesentcenter, Bayreuther Str. 108, 2. Stock",
                array(
                    'additionToAddress1' => "Wiesentcenter",
                    'streetName'         => "Bayreuther Str.",
                    'houseNumber'        => "108",
                    'additionToAddress2' => "2. Stock"
                )
            ),
        );
    }
}
