
<script src='https://api.mapbox.com/mapbox-gl-js/v0.19.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.19.1/mapbox-gl.css' rel='stylesheet' />

<div id='map' style='width: 100%; height: 600px;'></div>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiamFzb25oYWxzZXkiLCJhIjoiY2lrZm5oOWh3MDAxeHUza2w5MnM2aHdzYSJ9.WXf_OK1N34LKLlkBHCt_9w';
  var map = new mapboxgl.Map({
      container: 'map',
      center: [-121.315573, 44.047014],
      zoom: 16,
      style: 'mapbox://styles/mapbox/emerald-v8'
  });



 map.on('load', function () {
    map.addSource("markers", {
        "type": "geojson",
        "data": {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "geometry": {
                    "type": "Point",
                    "coordinates": [-121.315573, 44.047014]
                },
                "properties": {
                    "title": "Confluence Fly Shop",
                    "marker-symbol": "monument"
                }
            }]
        }
    });

    map.addLayer({
        "id": "markers",
        "type": "symbol",
        "source": "markers",
        "layout": {
            "icon-image": "{marker-symbol}-15",
            "text-field": "{title}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "text-offset": [0, 0.6],
            "text-anchor": "top"
        }
    });
});
  // map.scrollZoom.disable();
  map.addControl(new mapboxgl.Navigation());
  // map.touchZoom.disable();
  map.scrollZoom.disable();
  map.doubleClickZoom.disable();
  map.scrollWheelZoom.disable();
  map.keyboard.disable();
</script>

