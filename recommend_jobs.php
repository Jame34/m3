<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'db/connection.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT skill_name FROM users_skills WHERE user_id = ?");
$stmt->execute([$user_id]);
$user_skills = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Static job data
$static_jobs = [
    'Python 資料處理' => [
        ['title' => '資料分析師', 'company' => 'A 公司', 'url' => '#'],
        ['title' => '數據科學家', 'company' => 'B 公司', 'url' => '#'],
    ],
    'Python 視覺化' => [
        ['title' => '視覺化工程師', 'company' => 'C 公司', 'url' => '#'],
    ],
    'C++ 遊戲開發' => [
        ['title' => '遊戲開發工程師', 'company' => 'D 公司', 'url' => '#'],
    ],
    'JavaScript 網頁開發' => [
        ['title' => '前端工程師', 'company' => 'E 公司', 'url' => '#'],
        ['title' => '全端開發工程師', 'company' => 'F 公司', 'url' => '#'],
    ]
];

// Filter recommended jobs based on user's skills
$recommended_jobs = [];
foreach ($user_skills as $skill) {
    if (isset($static_jobs[$skill])) {
        $recommended_jobs = array_merge($recommended_jobs, $static_jobs[$skill]);
    }
}
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>

<link rel="stylesheet" href="assets/css/recommend.css">

<div class="container">
    <div class="row justify-content-between">
        <!-- Left Column: Skills Section -->
        <div class="col-md-5 mb-4">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4>你的技能</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($user_skills as $skill): ?>
                            <li class="list-group-item skill-item"><?php echo htmlspecialchars($skill); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Right Column: Job Recommendations Section -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h4>推薦職缺</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($recommended_jobs)): ?>
                        <ul class="list-group job-list">
                            <?php foreach ($recommended_jobs as $job): ?>
                                <li class="list-group-item job-item">
                                    <a href="<?php echo htmlspecialchars($job['url']); ?>" target="_blank" class="job-link">
                                        <div class="job-info">
                                            <h5 class="mb-1"><?php echo htmlspecialchars($job['title']); ?></h5>
                                            <p class="mb-0"><?php echo htmlspecialchars($job['company']); ?></p>
                                        </div>
                                        <span class="badge bg-primary">查看</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>目前沒有推薦的職缺。</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>