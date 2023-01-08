# ORMCrud, Example of use

//Database PDO connection and instance
# $db = new PDO("mysql:host=localhost;dbname=database_name", "username", "password");
# $orm = new ORM($db);

// Create a new record
# $orm->create("table_name", ['column1' => 'value1', 'column2' => 'value2', 'column3' => 'value3']);

// Read a record
# $record = $orm->read("table_name", 1);

// Update a record
# $orm->update("table_name", ['column1' => 'new_value1', 'column2' => 'new_value2', 'column3' => 'new_value3', 'id' => 1]);

// Delete a record
# $orm->delete("table_name", 1);
