<?PHP
use PHPUnit\Framework\TestCase;
/* my class in the src directory */
use App\App;

class myTest extends TestCase
{
    public static $database = __DIR__ . '/../data/myDatabase.db';

    public function testDependencies()
    {
        try {
            new \SQLite3(self::$database);
            this->assertTrue(true);
        } catch (\Throwable $e) {
            $this->fail('the extension for sqlite3 was not found');
        }
    }

    function testDatabaseExists()
    {
        $database = self::$database;
        $this->assertTrue(file_exists($database), "database not found in $database");
    }

    function testAntiDuplicates()
    {
        // try to insert dups
        $test1 = App::addUser(1337, 'deleteMe', 'deleteMe');
        $test2 = App::addUser(1337, 'deleteMe', 'deleteMe');
        // if both are true then the dups have been inserted
        $this->assertFalse(($test1 && $test2), 'duplicates should NOT be allowed');
        // clean the db
        $dbc = new \SQLite3(self::$database);
        $dbc->exec('delete from users where id=1337;');
    }

    function testSanityCheck()
    {
        $this->assertTrue(1 == 1, "if you're seeing this, you mustve broken beyond the fabric of universe itself");
    }

    function testSanityCheck2()
    {
        $this->assertTrue(1 == 2, 'the only error i would love to see');
    }
}
?>
