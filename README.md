# AddressSplitting
Tries to split an address line into street name, house number and other additional information like building,
apartment information etc.

## Usage
The AddressSplittingService only contains one static function `splitAddress` that performs the address splitting.
The function expects one parameter, which is the address line. The function returns an associative array with the
keys `additionToAddress1`, `streetName`, `houseNumber` and `additionToAddress2`. `additionToAddress1` and `additionToAddress2`
contain information given in front of or after the street name & house number, respectively.
 
## Example
You can use the address splitting service as follows:

	var_dump(AddressSplittingService::splitAddress('Pallaswiesenstr. 57 App. 235'));

The output of this command will be:

	array(4) {
		["additionToAddress1"]=>
		string(0) ""
		["streetName"]=>
		string(16) "Pallaswiesenstr."
		["houseNumber"]=>
		string(2) "57"
		["additionToAddress2"]=>
		string(8) "App. 235"
	}

## Supported Address Formats
We try to support all address formats used world-wide. E.g., the address splitter will work no matter if the house number
is given in front of or after the street name.

Here is a number of examples of addresses and how their splitted representation looks like: 

| Address line                                | additionToAddress1 |  streetName            | houseNumber | additionToAddress2 |
|---------------------------------------------|--------------------|------------------------|-------------|--------------------|
|56, route de Genève                          |                    |route de Genève         |56           |                    |
|Piazza dell'Indipendenza 14                  |                    |Piazza dell'Indipendenza|14           |                    |
|Neuhof 13/15                                 |                    |Neuhof                  |13/15        |                    |
|574 E 10th Street                            |                    |E 10th Street           |574          |                    |
|1101 Madison St # 600                        |                    |Madison St              |1101         |# 600               |
|3940 Radio Road, Unit 110                    |                    |Radio Road              |3940         |Unit 110            |
|D 6, 2                                       |                    |D 6                     |2            |                    |
|13 2ème Avenue                               |                    |2ème Avenue             |13           |                    |
|Apenrader Str. 16 / Whg. 3                   |                    |Apenrader Str.          |16           |Whg. 3              |
|Pallaswiesenstr. 57 App. 235                 |                    |Pallaswiesenstr.        |57           |App. 235            |
|Kirchengasse 7, 1. Stock Zi.Nr. 4            |                    |Kirchengasse            |7            |1. Stock Zi.Nr. 4   |
|Wiesentcenter, Bayreuther Str. 108, 2. Stock |Wiesentcenter       |Bayreuther Str.         |108          |2. Stock            |
|244W 300N #101                               |                    |W 300N                  |244          |#101                |
|Am Stein VIII                                |                    |Am Stein                |VIII         |                    |
|Corso XXII Marzo 69                          |                    |Corso XXII Marzo        |69           |                    |
|Frauenplatz 14 A                             |                    |Frauenplatz             |14 A         |                    |
|Mannerheimintie 13A2                         |                    |Mannerheimintie         |13A2         |&nbsp;              |


## Unit Tests
The examples above and even more exemplary address lines are part of our unit tests. The unit tests can be run on the following site:

[https://regex101.com/r/vO5fY7/1](https://regex101.com/r/vO5fY7/1)

## Further Information
The need for this functionality came up when we noticed that Shopware 5 does not contain individual fields for the street name
and the house number anymore. Nevertheless, we needed to have these separated for our [DHL Adapter](http://store.shopware.com/viison00656/dhl-adapter.html),
because the DHL API expects them to be passed individually.

More background information on how this implementation came together can be found in our [blog post](http://blog.viison.com/post/115849166487/shopware-5-from-a-technical-point-of-view#address-splitting).

