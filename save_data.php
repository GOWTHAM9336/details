<?php
$conn = new mysqli("localhost", "root", "", "friendship");

if ($conn->connect_error) {
    die("Connection failed");
}

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO responses 
(q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssssssssss",
    $data['q1'],$data['q2'],$data['q3'],$data['q4'],$data['q5'],
    $data['q6'],$data['q7'],$data['q8'],$data['q9'],$data['q10'],
    $data['q11'],$data['q12'],$data['q13'],$data['q14'],$data['q15'],
    $data['q16'],$data['q17'],$data['q18'],$data['q19'],$data['q20']
);

if($stmt->execute()){
    echo "success";
} else {
    echo "error";
}
?>
