<?php
use VIISON\AddressSplitter\AddressSplitter;

class AddressSplitterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validAddressesProvider
     *
     * @param string $address
     * @param array  $expected
     */
    public function testValidAddresses($address, $expected)
    {
        $this->assertSame($expected, AddressSplitter::splitAddress($address));
    }

    /**
     * @return array
     */
    public function validAddressesProvider()
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
                'Piazza dell\'Indipendenza 14',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Piazza dell\'Indipendenza',
                    'houseNumber'        => '14',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Neuhof 13/15',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Neuhof',
                    'houseNumber'        => '13/15',
                    'additionToAddress2' => ''

                )
            ),
            array(
                '574 E 10th Street',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'E 10th Street',
                    'houseNumber'        => '574',
                    'additionToAddress2' => ''
                )
            ),
            array(
                '1101 Madison St # 600',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Madison St',
                    'houseNumber'        => '1101',
                    'additionToAddress2' => '# 600'
                )
            ),
            array(
                '3940 Radio Road, Unit 110',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Radio Road',
                    'houseNumber'        => '3940',
                    'additionToAddress2' => 'Unit 110'
                )
            ),
            array(
                'D 6, 2',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'D 6',
                    'houseNumber'        => '2',
                    'additionToAddress2' => ''
                )
            ),
            array(
                '13 2ème Avenue',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => '2ème Avenue',
                    'houseNumber'        => '13',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Apenrader Str. 16 / Whg. 3',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Apenrader Str.',
                    'houseNumber'        => '16',
                    'additionToAddress2' => 'Whg. 3'
                )
            ),
            array(
                'Pallaswiesenstr. 57 App. 235',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Pallaswiesenstr.',
                    'houseNumber'        => '57',
                    'additionToAddress2' => 'App. 235'
                )
            ),
            array(
                'Kirchengasse 7, 1. Stock Zi.Nr. 4',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Kirchengasse',
                    'houseNumber'        => '7',
                    'additionToAddress2' => '1. Stock Zi.Nr. 4'
                )
            ),
            array(
                'Wiesentcenter, Bayreuther Str. 108, 2. Stock',
                array(
                    'additionToAddress1' => 'Wiesentcenter',
                    'streetName'         => 'Bayreuther Str.',
                    'houseNumber'        => '108',
                    'additionToAddress2' => '2. Stock'
                )
            ),
            array(
                '244W 300N #101',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'W 300N',
                    'houseNumber'        => '244',
                    'additionToAddress2' => '#101'
                )
            ),
            array(
                'Am Stein VIII',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Am Stein',
                    'houseNumber'        => 'VIII',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Corso XXII Marzo 69',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Corso XXII Marzo',
                    'houseNumber'        => '69',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Frauenplatz 14 A',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Frauenplatz',
                    'houseNumber'        => '14 A',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Mannerheimintie 13A2',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Mannerheimintie',
                    'houseNumber'        => '13A2',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Heinestr.13',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Heinestr.',
                    'houseNumber'        => '13',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Am Aubach11',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Am Aubach',
                    'houseNumber'        => '11',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Tür 18',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Tür',
                    'houseNumber'        => '18',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Çevreyolu Cd. No:19',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Çevreyolu Cd.',
                    'houseNumber'        => '19',
                    'additionToAddress2' => ''
                )
            ),
            array(
                'Kerkstraat 3HS',
                array(
                    'additionToAddress1' => '',
                    'streetName'         => 'Kerkstraat',
                    'houseNumber'        => '3HS',
                    'additionToAddress2' => ''
                )
            ),
        );
    }

    /**
     * @dataProvider invalidAddressesProvider
     * @expectedException InvalidArgumentException
     *
     * @param string $address
     * @param array $expected
     */
    public function testInvalidAddress($address)
    {
        AddressSplitter::splitAddress($address);
    }

    /**
     * @return array
     */
    public function invalidAddressesProvider()
    {
        return array(
            array('House number missing'),
            array('123'),
            array('#101')
        );
    }
}
