<?php


namespace App\Controllers;

use App\Repository\EmbraespTableRepository;
use \PhpOffice\PhpSpreadsheet\Reader\Xls;
use \App\Model\EmbraespTable;
class Reader
{

    private Xls $reader;
    private string $fileName;
    private string $fileType;
    private array $worksheetList;
    private ?\ArrayObject $table;

    public function __construct($fileName = false)
    {
        $this->reader = new Xls();
        $this->fileName = $fileName;
        $this->worksheetList = $this->reader->listWorksheetNames($this->fileName);
//        $this->readAndSave();

    }




    public function readAndSave()
    {
        try {
            $embraespTable = new EmbraespTable();

            $table = $this->reader->load($this->fileName);
            $tableSize = $this->getTableSize($table);

            $embraespTRepository = new EmbraespTableRepository();
            $embraespTRepository->clean();

            foreach($this->worksheetList as $list){
               $embraespTable->buildAndSave($table->getSheetByName($list));
            }


            var_dump($this->compareInsertedWithSize($tableSize, getDbTableSize()));



        } catch(\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            die('Error loading file: '.$e->getMessage());
        }
    }

    public function getTableSize($table) :int
    {
        $tableSize = 0;
        foreach($this->worksheetList as $list){
            $worksheet = $table->getSheetByName($list);
            $tableSize += $worksheet->getHighestRow();

        }
        return $tableSize;
    }

    public function getDbTableSize():int
    {
        $embraespTable = new EmbraespTable();
        return $embraespTable->count();
    }
    public function compareInsertedWithSize(int $tableSize, int $inserted) :bool
    {

        return $tableSize == $inserted;

    }


    public function showTable($table)
    {
        var_dump($table);

    }
}