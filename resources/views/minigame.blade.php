<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotating Rainbow Cube with Text</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <style>
        body { margin: 0; overflow: hidden; }
        canvas { display: block; }
    </style>
</head>
<body>
    
    <script>
        let scene = new THREE.Scene();
        let camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        let renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);
        function createTextTexture(text, color) {
            let canvas = document.createElement("canvas");
            let ctx = canvas.getContext("2d");
            canvas.width = 256;
            canvas.height = 256;
            ctx.fillStyle = color;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.font = "Bold 20px Arial";
            ctx.fillStyle = "white";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";
            ctx.fillText(text, canvas.width / 2, canvas.height / 2);
            let texture = new THREE.CanvasTexture(canvas);
            return texture;
        }
        let colors = ["#ff0000", "#ff8000", "#ffff00", "#00ff00", "#0000ff", "#8000ff"];
        let texts = ["Database mismatch","Database mismatch","Database mismatch","visit README.md","visit README.md","visit README.md"];
        let materials = colors.map((color, i) => new THREE.MeshBasicMaterial({ map: createTextTexture(texts[i], color) }));
        let geometry = new THREE.BoxGeometry(3, 3, 3);
        let cube = new THREE.Mesh(geometry, materials);
        scene.add(cube);
        camera.position.z = 5;
        function animate() {
            requestAnimationFrame(animate);
            cube.rotation.x += 0.003;
            cube.rotation.y += 0.003;
            renderer.render(scene, camera);
        }
        animate();
    </script>
</body>
</html>

