<?php include 'templates/header.php'; ?>
<link rel="stylesheet" href="assets/css/addpath.css">
<?php include 'templates/navbar.php'; ?>
<title>新增學習路徑</title>

<div class="page-wrapper">
    <!-- 頂部標題 -->
    <header class="header">
        <h1 class="page-title">知識圖譜</h1>
    </header>

    <!-- 表單容器 -->
    <div class="container">
        <div class="form-wrapper">
            <h2 class="title">新增學習路徑</h2>
            <form id="add-path-form" class="neon-form">
                <label for="category" class="neon-label">選擇類別：</label>
                <select id="category" name="category" class="neon-input" required>
                    <option value="程式語言與開發">程式語言與開發</option>
                    <option value="人工智慧與資料科學">人工智慧與資料科學</option>
                    <option value="數學與統計">數學與統計</option>
                    <option value="美術與設計">美術與設計</option>
                    <option value="語言學習">語言學習</option>
                </select>

                <label for="subcategory" class="neon-label">類別名稱：</label>
                <input type="text" id="subcategory" name="subcategory" class="neon-input" required>

                <label for="goal" class="neon-label">學習目標：</label>
                <input type="text" id="goal" name="goal" class="neon-input" required>

                <button type="submit" class="neon-button">提交</button>
            </form>
            <div id="response-message" class="neon-message"></div>
        </div>
    </div>
</div>

<script>
document.getElementById('add-path-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = {
        category: document.getElementById('category').value,
        subcategory: document.getElementById('subcategory').value,
        goal: document.getElementById('goal').value
    };

    fetch('api/add_path.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('response-message').innerText = data.success ? '新增成功！' : '錯誤：' + data.error;
    });
});
</script>

<?php include 'templates/footer.php'; ?>
