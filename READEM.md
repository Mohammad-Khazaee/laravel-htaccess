Important: this feature is available starting from Laravel 5.5. With version 5.4 or below, you must register your facades manually in the aliases section of the config/app.php configuration file.

You can also load an alias from a Service Provider (or anywhere else) by using the AliasLoader singleton class:

$loader = \Illuminate\Foundation\AliasLoader::getInstance();
$loader->alias('Calculator', "JohnDoe\\BlogPackage\\Facades\\Calculator");
Our facade now no longer requires an import and can be used in projects from the root namespace:

// Usage of the example Calculator facade
Calculator::add(5)->subtract(3)->getResult(); // 2