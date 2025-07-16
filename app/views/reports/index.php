<?php
if (isset($_SESSION['username']) && strtolower($_SESSION['username']) !== 'admin') {
  header('Location: /home');
  die;
}
?>
<?php require_once 'app/views/templates/header.php'; ?>
<style>
.reports-flex {
  display: flex;
  gap: 32px;
  align-items: flex-start;
}
.reports-col {
  flex: 1;
}
.reports-section { margin-bottom: 24px; }
#most-reminders { margin-bottom: 16px; font-size: 1.1em; }
.reports-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.04);
  overflow: hidden;
  margin-bottom: 18px;
}
.reports-table th, .reports-table td {
  padding: 10px 14px;
  text-align: left;
}
.reports-table th {
  background: #f1f5f9;
  font-weight: bold;
  border-bottom: 2px solid #e2e8f0;
}
.reports-table tr {
  border-bottom: 1px solid #e2e8f0;
}
.reports-table tr:hover {
  background: #f8fafc;
}
.small-table {
  font-size: 0.95em;
  max-width: 260px;
}
.small-table th, .small-table td {
  padding: 5px 8px;
}
.chart-box {
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.04);
  padding: 10px 6px 6px 6px;
  margin-top: 8px;
}
@media (max-width: 900px) {
  .reports-flex { flex-direction: column; gap: 16px; }
}
</style>

<div style="max-width:1200px;margin:32px auto 0 auto;">
    <div id="most-reminders" class="reports-section" style="background:#e0f2fe;color:#0369a1;padding:12px 18px;border-radius:8px;font-size:1.15em;font-weight:500;margin-bottom:18px;">
        <?php 
        if ($reminders && count($reminders) > 0 && $most_reminders && $most_reminders['username']) {
            echo "User with Most Reminders: {$most_reminders['username']} ({$most_reminders['count']} reminders)";
        } else {
            echo "No reminders found.";
        }
        ?>
    </div>

    <div class="reports-section">
        <h2 style="margin-bottom:4px;">Total Logins by Username</h2>
        <table id="logins-table" class="reports-table small-table">
            <thead>
                <tr><th>Username</th><th>Login Count</th></tr>
            </thead>
            <tbody>
                <?php foreach ($logins as $login): ?>
                <tr>
                    <td><?= htmlspecialchars($login['username']) ?></td>
                    <td><?= $login['count'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="reports-flex">
        <div class="reports-col">
            <h2>All Reminders</h2>
            <table id="reminders-table" class="reports-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Completed</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reminders as $reminder): ?>
                    <tr>
                        <td><?= htmlspecialchars($reminder['title']) ?></td>
                        <td><?= htmlspecialchars($reminder['description'] ?? '') ?></td>
                        <td><?= htmlspecialchars($reminder['due_date'] ?? '') ?></td>
                        <td><?= $reminder['completed'] ? 'Yes' : 'No' ?></td>
                        <td><?= htmlspecialchars($reminder['username']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="reports-col">
            <h2>Reminders per User (Chart)</h2>
            <div class="chart-box">
                <canvas id="remindersChart" width="300" height="180"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const userCounts = <?php echo json_encode($user_counts); ?>;
const ctx = document.getElementById('remindersChart').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: userCounts.map(u => u.username),
    datasets: [{
      label: 'Reminders per User',
      data: userCounts.map(u => u.count),
      backgroundColor: 'rgba(54, 162, 235, 0.5)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1
    }]
  },
  options: {
    plugins: {
      legend: { display: true, position: 'top' }
    },
    scales: { y: { beginAtZero: true } }
  }
});
</script>

<?php require_once 'app/views/templates/footer.php'; ?> 