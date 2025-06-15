<!-- Exemple de card générée en PHP -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Mon modèle 3D</h5>
        <div id="viewer1" style="width: 300px; height: 300px;"></div>
    </div>
</div>

<!-- Charger Three.js et GLTFLoader -->
<script src="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.160.0/examples/js/loaders/GLTFLoader.js"></script>
<script>
    const container = document.getElementById('viewer1');

    // Créer la scène
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Lumière
    const light = new THREE.DirectionalLight(0xffffff, 1);
    light.position.set(2, 2, 5);
    scene.add(light);

    // Charger un modèle GLB/GLTF
    const loader = new THREE.GLTFLoader();
    loader.load('../assets/models/vase_lowpoly.glb', function(gltf) {
        const model = gltf.scene;
        scene.add(model);
        model.position.set(0, -1, 0);

        // Animation de rotation
        function animate() {
            requestAnimationFrame(animate);
            model.rotation.y += 0.01;
            renderer.render(scene, camera);
        }
        animate();
    }, undefined, function(error) {
        console.error(error);
    });

    camera.position.z = 3;
</script>
