<?php


$students = [
    ["name" => "ندى",         "grade" => 92, "age" => 20],
    ["name" => "نيفين",       "grade" => 75, "age" => 21],
    ["name" => "عبد الرحمن",  "grade" => 85, "age" => 19],
    ["name" => "نانا",        "grade" => 55, "age" => 22],
    ["name" => "سند",         "grade" => 63, "age" => 20],
];

function calculateStatus($grade) {
    if ($grade >= 90)      return "ممتاز";
    elseif ($grade >= 80)  return "جيد جدا";
    elseif ($grade >= 70)  return "جيد";
    elseif ($grade >= 60)  return "مقبول";
    else                   return "راسب";
}

$grades = array_column($students, "grade");
$maxGrade = max($grades);
$minGrade = min($grades);
$avg = array_sum($grades) / count($grades);
$passCount = 0;
foreach ($students as $s) {
    if ($s["grade"] >= 60) $passCount++;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بيانات الطلاب</title>
    <style>
        body {
            font-family: Arial;
            padding: 30px;
            background-color: #fff0f5;
        }
        h2 {
            color: #c2185b;
            text-align: center;
            font-size: 28px;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin: auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(194,24,91,0.2);
        }
        th {
            background-color: #f48fb1;
            color: white;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }
        td {
            border: 1px solid #f8bbd0;
            padding: 10px;
            text-align: center;
            background-color: #fff;
        }
        tr:hover td {
            background-color: #fce4ec;
        }
        .stats {
            margin: 25px auto;
            background: linear-gradient(135deg, #fce4ec, #f8bbd0);
            padding: 20px 30px;
            width: 65%;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(194,24,91,0.15);
            color: #880e4f;
        }
        .stats h3 {
            text-align: center;
            color: #c2185b;
            margin-bottom: 15px;
        }
        .stats p {
            font-size: 16px;
            margin: 8px 0;
        }
    </style>
</head>
<body>

<h2> جدول بيانات الطلاب </h2>

<table>
    <tr>
        <th>الاسم</th>
        <th>الدرجة</th>
        <th>العمر</th>
        <th>الحالة</th>
    </tr>
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?= $student["name"] ?></td>
        <td><?= $student["grade"] ?></td>
        <td><?= $student["age"] ?></td>
        <td><?= calculateStatus($student["grade"]) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="stats">
    <h3> الإحصائيات</h3>
    <p> أعلى درجة: <?= $maxGrade ?></p>
    <p> أقل درجة: <?= $minGrade ?></p>
    <p> معدل الدرجات: <?= round($avg, 2) ?></p>
    <p> عدد الناجحين: <?= $passCount ?></p>
</div>

</body>
</html>
