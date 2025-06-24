<?php
include('../connection.php');
header('Content-Type: application/json');

$data = [];

try {
    $blood_groups = ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

    foreach ($blood_groups as $bg) {
        $stmt = $db->prepare("SELECT COUNT(*) AS count FROM donors WHERE blood_group = ?");
        $stmt->execute([$bg]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data[$bg] = $row['count'];
    }

    echo json_encode($data);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
