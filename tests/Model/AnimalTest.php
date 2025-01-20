<?php

declare(strict_types=1);

use App\Database\DbConnection;
use App\Model\Animal;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase
{
    public static function getAllAnimalsProvider() : array
    {
        return [
            [['id']],
            [['name', 'breed']],
            [['id', 'name', 'breed', 'image']],
        ];
    }
    
    #[DataProvider('getAllAnimalsProvider')]
    public function testGetAllAnimals(array $fields = []) : void
    {
        $pdo = DbConnection::getPdo();
        $animalModel = new Animal($pdo);
        $animals = $animalModel->getAllAnimals(...$fields);

        $this->assertIsArray($animals);

        foreach($animals as $animal) {
            if(empty($fields) || array_search('id', $fields) !== false) {
                $this->assertArrayHasKey('id', $animal);
            }
            if(empty($fields) || array_search('name', $fields) !== false) {
                $this->assertArrayHasKey('name', $animal);
            }
            if(empty($fields) || array_search('breed', $fields) !== false) {
                $this->assertArrayHasKey('breed', $animal);
            }
            if(empty($fields) || array_search('image', $fields) !== false) {
                $this->assertArrayHasKey('image', $animal);
            }
        }
    }

    public static function getAllAnimalsErrorProvider() : array
    {
        return [
            [[128], TypeError::class],
            [[true], TypeError::class],
            [[['test']], TypeError::class],
        ];
    }

    #[DataProvider('getAllAnimalsErrorProvider')]
    public function testGetAllAnimalsError(array $wrongFields, string $expectedException) : void
    {
        $this->expectException($expectedException);
        
        $pdo = DbConnection::getPdo();
        $animalModel = new Animal($pdo);
        $animalModel->getAllAnimals(...$wrongFields);
    }    
}