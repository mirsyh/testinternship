<?php
include_once 'StuHeader.php';
$sql = "SELECT * FROM `internships` JOIN `companies` ON internships.internship_company_id  = companies.company_id";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM `internships` JOIN `companies` ON internships.internship_company_id  = companies.company_id WHERE internship_title LIKE '%$search%' ";
}
$result = $conn->query($sql);
?>


<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;

    }

    td {
        border: 1px solid black;
        text-align: left;
        padding: 10px;
    }

    th {
        border: 1px solid black;
        text-align: center;
        padding: 3px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .search {
        width: 20%;
        padding: 5px;
        border: 2px solid grey;
        border-radius: 5px;
    }

    .btn {
        padding: 5px;
        border: 2px solid grey;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
    }
</style>

<h3 style='text-align:center'>Internship Listings</h3><br>

<!-- search -->
<form action="" method="GET" style="text-align:center">
    <input type="text" name="search" placeholder="Search by Job Title" class="search" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <input type="submit" value="Search" class="btn btn-primary">
</form>
<br>
<br>
<table>
    <tr>
        <th>Job Title</th>
        <th>Job Allowance</th>
        <th>Job Location</th>
        <th>Company Name</th>
        <th>Apply</th>
    </tr>
    <?php foreach ($result as $key => $row) : ?>
        <tr>
            <td><?= $row["internship_title"] ?></td>
            <td><?= $row["internship_allowance"] ?></td>
            <td><?= $row["internship_location"] ?></td>
            <td><?= $row["company_name"] ?></td>
            <td><a href="StuApplyJob.php?id=<?= $row["internship_id"] ?>">Apply</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once 'footer.php'; ?>