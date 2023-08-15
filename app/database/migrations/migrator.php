<?php declare(strict_types=1);

namespace App\database\migrations;
use App\core\config\database;
use App\database\Setup;
use PDO;
class migrator
{
    /**
     * You Can Migrate Only once at a time
     */
    private PDO $worker;
    public function __construct()
    {
        $dbInfo = database::getConfig();
        $setup = new Setup($dbInfo);
        $this->worker = $setup->getConnectionInstance();
    }
    public function prepare(array $statements)
    {
        file_put_contents(ROOT . "app/database/migrations.sql",$statements["query"] . PHP_EOL);
    }
    public function migrate()
    {
        $query = file_get_contents(ROOT . "app/database/migrations.sql");
        if(empty($query)){
            throw \App\core\error\Database::noQueryFound();
        }
        $preparedStatement = $this->worker->prepare($query);
        $preparedStatement->execute();
    }

}