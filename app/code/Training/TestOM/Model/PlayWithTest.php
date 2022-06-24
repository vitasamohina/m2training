<?php
namespace Training\TestOM\Model;

class PlayWithTest{
    private $testObject;
    private $testObjectFactory;
    private $manager;

    public function __construct(
        \Training\TestOM\Model\Test $testObject,
        \Training\TestOM\Model\TestFactory $testObjectFactory,
        \Training\TestOM\Model\ManagerCustomImplementation $manager
    ){
        $this->testObject = $testObject;
        $this->testObjectFactory = $testObjectFactory;
        $this->manager = $manager;
    }
    public function run(){
        $this->testObject->log();
        $customArrayList = ['item1' => 'aaaaa', 'item2' => 'bbbbb'];
        $newTestObject = $this->testObjectFactory->create([
            'arrayList' => $customArrayList,
            'manager' => $this->manager
        ]);
        $newTestObject->log();
    }
}
