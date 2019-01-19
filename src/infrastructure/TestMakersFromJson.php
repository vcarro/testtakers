<?php
declare(strict_types=1);

namespace OatAPI\Infraestructure;

use OatAPI\Domain\TestMakerRepository;
use OatAPI\Domain\TMId;

final class TestMakersFromJson implements TestMakerRepository
{
    private $fileName;

    public function __construct(string $fileName)
    {
	$this->fileName = $fileName;
    }

    public function all() : TestMakers
    {
	$TMTotalData = $this->readData();

	return TestMakers($arrayData);
    }

    public function search(TMId $id): ?TestMaker
    {
	$TMTotalData = $this->readData();
    
	if ( array_key_exists($id, $TMTotalData) ) {
	    return null;
	}

	$TMData = $TMTotalData[$id];

	$TestMaker = new TestMaker(
		$TMData->id(),
		$TMData->login(),
		$TMData->password(),
		$TMData->title(),
		$TMData->lastname(),
		$TMData->firstname(),
		$TMData->gender(),
		$TMData->email(),
		$TMData->picture(),
		$TMData->address()
	);

	return $TestMaker;
    }

    private readData() : array
    {
	if ( !file_exists($this->fileName) ) {
	    return array();
	}

        $jsonContentFile = file_get_contents($this->fileName);

        // Convert to array 
	$arrayData = json_decode($jsonContentFile, true);

	return $arrayData;
    }
}
