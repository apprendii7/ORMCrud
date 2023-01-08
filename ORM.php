class ORM {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function create($table, $data) {
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), "?"));
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array_values($data));
  }

  public function read($table, $id) {
    $sql = "SELECT * FROM $table WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
  }

  public function update($table, $data) {
    $columns = implode(", ", array_map(function ($column) {
      return "$column = ?";
    }, array_keys($data)));
    $sql = "UPDATE $table SET $columns WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array_values($data));
  }

  public function delete($table, $id) {
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
  }
}
