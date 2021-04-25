<html>
<head>
    <style type="text/css"> html, body, #mapFrame { width: 100%; height: 100%; margin: 0; padding: 0; } </style>
    <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
</head>
<body>

<div id="harita" style="width:100%; height:100%">
    <iframe id="mapFrame" src="http://sehirharitasi.ibb.gov.tr/">
        <p>Your browser doesn't support the features of iframe!</p>
    </iframe>
</div>

<script>
    var ibbMAP = new SehirHaritasiAPI({mapFrame:"mapFrame",apiKey:"..."}, function(){
        ibbMAP.Nearby.Open({
            lat: 41.01371789571470,
            lon: 28.95547972584920,
            type: "eğitim,kamu",
            distance: 300
        });
    });
</script>

</body>
</html>
