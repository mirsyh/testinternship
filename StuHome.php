<?php include_once 'StuHeader.php'; ?>
<style>
    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 15px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .card {
        flex: 1;
        min-width: 200px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card h3 {
        margin-bottom: 10px;
        font-size: 1.2em;
        color: #333;
    }

    .card p {
        font-size: 1.1em;
        color: #666;
    }

    h3.dashboard-title {
        text-align: center;
        font-size: 2em;
        margin-bottom: 20px;
        color: #333;
    }
</style>
<?php

$sql_application = "SELECT * FROM `student_internships` WHERE 'student_internship_status' = 'Applied'";
$result_application = $conn->query($sql_application);

?>
<h3 class="dashboard-title">Dashboard</h3>

<div class="container">
    <div class="row">
        <div class="card" onclick="window.location='StuApplicationList.php';" style="cursor: pointer;">
            <h3>Pending Applications</h3>
            <p><?= $result_application->num_rows; ?></p>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>