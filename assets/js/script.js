document.addEventListener('DOMContentLoaded', function () {
    const YOUTUBE_API_KEY = 'AIzaSyCLYTtBaSMkoxOYk0Lf4TTC0wS0NvcKECU'; // 替換為有效的 API Key
    const MAX_RESULTS = 3;

    /*** 初始化學習路徑圖 ***/
    Promise.all([
        fetch('api/get_nodes.php').then(res => res.json()),
        fetch('api/get_relations.php').then(res => res.json())
    ])
    .then(([nodes, relations]) => {
        // 初始化學習路徑圖
        initializeGraph(nodes, relations);

        // 新增轉盤效果
        createCarouselFromNodes(nodes);
    })
    .catch(error => {
        console.error('初始化學習路徑圖時出錯:', error);
    });

    /*** 學習路徑圖初始化 ***/
    function initializeGraph(nodes, relations) {
        const visNodes = nodes.map(node => ({
            id: node.id,
            label: node.name,
            title: node.description || '',
            color: node.level === 1 ? '#87CEEB' : (node.completed ? '#90EE90' : '#F0F8FF')
        }));

        const visEdges = relations.map(relation => ({
            from: relation.source_node_id,
            to: relation.target_node_id,
            arrows: 'to'
        }));

        const container = document.getElementById('knowledge-graph');
        const data = { nodes: visNodes, edges: visEdges };
        const options = {
            layout: { hierarchical: { direction: 'UD' } },
            nodes: { shape: 'box', font: { size: 14 } },
            edges: { arrows: 'to', smooth: true }
        };

        const network = new vis.Network(container, data, options);

        /*** 點擊節點時觸發 ***/
        network.on('click', function (params) {
            if (params.nodes.length > 0) {
                const nodeId = params.nodes[0];
                const node = nodes.find(n => n.id === nodeId);

                if (!node) {
                    console.error("未找到對應的節點:", nodeId);
                    return;
                }

                console.log(`點擊節點：${node.name}`);
                fetchYouTubeVideos(node.name, node.id); // 傳遞 node.name 和 node.id
            }
        });
    }

    /*** 創建轉盤效果 ***/
    function createCarouselFromNodes(nodes) {
        const container = document.getElementById('carousel-container');

        // 防止容器不存在導致錯誤
        if (!container) {
            console.error('找不到 #carousel-container 容器，無法初始化轉盤。');
            return;
        }

        // Three.js 場景設置
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.offsetWidth / container.offsetHeight, 0.1, 1000);
        camera.position.z = 5;

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(container.offsetWidth, container.offsetHeight);
        container.appendChild(renderer.domElement);

        const items = [];
        const radius = 3; // 轉盤半徑
        nodes.forEach((node, index) => {
            const angle = (index / nodes.length) * Math.PI * 2;
            const x = radius * Math.cos(angle);
            const y = radius * Math.sin(angle);

            // 節點（立方體表示）
            const geometry = new THREE.BoxGeometry(0.5, 0.5, 0.5);
            const material = new THREE.MeshBasicMaterial({ color: 0x007BFF });
            const box = new THREE.Mesh(geometry, material);

            box.position.set(x, y, 0);
            scene.add(box);
            items.push({ box, node });
        });

        // 動態更新動畫
        function animate() {
            requestAnimationFrame(animate);

            // 簡單旋轉
            items.forEach(item => {
                item.box.rotation.y += 0.01;
            });

            renderer.render(scene, camera);
        }
        animate();

        // 點擊事件處理（Raycaster）
        const raycaster = new THREE.Raycaster();
        const mouse = new THREE.Vector2();

        container.addEventListener('click', (event) => {
            mouse.x = (event.clientX / container.offsetWidth) * 2 - 1;
            mouse.y = -(event.clientY / container.offsetHeight) * 2 + 1;

            raycaster.setFromCamera(mouse, camera);
            const intersects = raycaster.intersectObjects(scene.children);

            if (intersects.length > 0) {
                const selectedBox = intersects[0].object;
                const selectedItem = items.find(item => item.box === selectedBox);

                if (selectedItem) {
                    console.log(`選中的節點名稱: ${selectedItem.node.name}`);
                    fetchYouTubeVideos(selectedItem.node.name, selectedItem.node.id); // 傳遞 node.id
                }
            }
        });
    }

    /*** YouTube API 調用 ***/
    function fetchYouTubeVideos(query, nodeId) {
        const videosContainer = document.getElementById('youtube-videos');
        videosContainer.innerHTML = '<p>載入中...</p>';

        const encodedQuery = encodeURIComponent(query);
        const url = `https://www.googleapis.com/youtube/v3/search?part=snippet&q=${encodedQuery}&type=video&maxResults=${MAX_RESULTS}&key=${YOUTUBE_API_KEY}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                videosContainer.innerHTML = '';
                if (data.items.length > 0) {
                    data.items.forEach(video => {
                        const videoHTML = `
                            <div class="video-item">
                                <a href="player.php?video_id=${video.id.videoId}&node_id=${nodeId}" target="_self">
                                    <img src="${video.snippet.thumbnails.medium.url}" alt="${video.snippet.title}">
                                    <p>${video.snippet.title}</p>
                                </a>
                            </div>`;
                        videosContainer.innerHTML += videoHTML;
                    });
                } else {
                    videosContainer.innerHTML = '<p>找不到相關影片。</p>';
                }
            })
            .catch(() => {
                videosContainer.innerHTML = '<p>無法加載影片。</p>';
            });
    }
});
