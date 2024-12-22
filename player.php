<?php
$videoId = isset($_GET['video_id']) ? htmlspecialchars($_GET['video_id']) : null;
$nodeId = isset($_GET['node_id']) ? intval($_GET['node_id']) : null;

if (!$videoId) {
    die("缺少影片 ID");
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>影片播放</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h2 {
            margin-top: 20px;
        }

        #player {
            margin: 20px auto;
            width: 80%;
            max-width: 800px;
            height: 450px;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: green;
        }
    </style>
    <script src="https://www.youtube.com/iframe_api"></script>
</head>
<body>
    <h2>影片播放</h2>
    <div id="player"></div>
    <div class="message" id="completion-message"></div>

    <script>
        let player;
        const videoId = "<?php echo $videoId; ?>";
        const nodeId = "<?php echo $nodeId; ?>";

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                videoId: videoId,
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.ENDED) {
                document.getElementById('completion-message').innerText = '影片播放完成，學習進度已更新！';

                fetch('api/mark_node_complete.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ nodeId: nodeId })
                }).then(response => response.json())
                  .then(data => {
                      if (!data.success) {
                          console.error('無法更新節點狀態:', data.error);
                      }
                  }).catch(error => {
                      console.error('API 請求錯誤:', error);
                  });
            }
        }
    </script>
</body>
</html>
