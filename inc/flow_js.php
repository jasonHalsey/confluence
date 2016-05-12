<script type="text/javascript">
var usgsNum = '<?php echo $usgs_site ?>';

var flowAPI = 'http://waterservices.usgs.gov/nwis/iv/?format=json&indent=on&sites=' + usgsNum + '&parameterCd=00065&siteType=ST';

   
weatherFn = function(url) {
  jQuery.getJSON(url, function (json) {

    var dateCreate = json.creationDateLocal
    var weatherTime  = json.time.startPeriodName[0]
    var weatherText = json.data.text[0]
    var weatherWeather = json.data.weather[0]
    var weatherTemp = json.data.temperature[0]

    jQuery('.weather_date').text(dateCreate);
    jQuery('.weather_time').text(weatherTime);
    jQuery('.weather_temp').html(weatherTemp + '&deg;');
    jQuery('.weather_text').text(weatherText);
    jQuery('.weather_weather').text(weatherWeather);

    if(weatherWeather == "Isolated Showers") {
      jQuery('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }
    else if(weatherWeather == "Mostly Cloudy") {
      jQuery('#weather_icon').addClass('diw-clouds')
    }
    else if(weatherWeather == "Chance Rain") {
      jQuery('#weather_icon').addClass('diw-cloud-hail-sun')
    }
    else if(weatherWeather == "Mostly Sunny") {
      jQuery('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }
    else if(weatherWeather == "Mostly Clear") {
      jQuery('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }
    else if(weatherWeather == "Sunny") {
      jQuery('#weather_icon').addClass('diw-sun')
    }
    else if(weatherWeather == "Clear") {
      jQuery('#weather_icon').addClass('diw-sun')
    }
    else if(weatherWeather == "Slight Chance Rain then Partly Sunny") {
      jQuery('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }
    else {
      jQuery('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }


  })
}

jQuery.getJSON(flowAPI, function (json) {

  var baseString = json.value.timeSeries[0]
  var createTime = baseString.values[0].value[0].dateTime
  var locationName = baseString.sourceInfo.siteName
  var flowNum = baseString.values[0].value[0].value
  var flowLat = baseString.sourceInfo.geoLocation.geogLocation.latitude
  var flowLong = baseString.sourceInfo.geoLocation.geogLocation.longitude
  weatherFn("http://forecast.weather.gov/MapClick.php?lat=" + flowLat + "&lon=" + flowLong + "&FcstType=json");
  var map = L.mapbox.map('map-one', 'mapbox.satellite').setView([flowLat,flowLong], 18);

 // Disable drag and zoom handlers.
  // map.dragging.disable();
  map.touchZoom.disable();
  map.doubleClickZoom.disable();
  map.scrollWheelZoom.disable();
  map.keyboard.disable();

  // Disable tap handler, if present.
  if (map.tap) map.tap.disable();


  var str = locationName;
  function getWords(str) {
    return str.split(/\s+/).slice(0,2).join(" ");
  }

  L.mapbox.featureLayer({
      type: 'Feature',
      geometry: {
          type: 'Point',
          coordinates: [
            flowLong,
            flowLat
          ]
      },
      properties: {
          title: locationName,
          description: 'Flow: ' + flowNum + ' ft3/s',
          'marker-size': 'large',
          'marker-color': '#BE9A6B',
          'marker-symbol': 'water'
      }
  }).addTo(map);

    jQuery('.river_name').html(getWords(str));
    jQuery('.createTime').text(createTime);
    jQuery('.sitename').text(locationName);
    jQuery('.flowNum').html
    (flowNum + '&nbsp;cfs');


    if(flowNum >= 4700) {
      jQuery('#gauge').addClass('success');
    }
})


jQuery(document).ready(function(){

  L.mapbox.accessToken = 'pk.eyJ1IjoiamFzb25oYWxzZXkiLCJhIjoiY2lrZm5oOWh3MDAxeHUza2w5MnM2aHdzYSJ9.WXf_OK1N34LKLlkBHCt_9w';

});



</script>