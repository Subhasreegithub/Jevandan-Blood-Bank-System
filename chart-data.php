<?php
include('../connection.php'); // your PDO connection with $db

header('Content-Type: application/json');

$data = [
    'donors' => 0,
    'recipients' => 0,
    'camps' => 0,
    
];

try {
    // Donor count
    $stmt = $db->query("SELECT COUNT(*) AS total FROM donors");
    $data['donors'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Recipient count
    $stmt = $db->query("SELECT COUNT(*) AS total FROM recipients");
    $data['recipients'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Camp count
    $stmt = $db->query("SELECT COUNT(*) AS total FROM blood_camps");
    $data['camps'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    

    echo json_encode($data);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
