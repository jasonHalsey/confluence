<script type="text/javascript">

//Stream Flow Test
var flowAPI = "http://waterservices.usgs.gov/nwis/iv/?format=json&indent=on&sites=14076500&parameterCd=00065&siteType=ST";

weatherFn = function(url) {
  $.getJSON(url, function (json) {

    var dateCreate = json.creationDateLocal
    var weatherTime  = json.time.startPeriodName[0]
    var weatherText = json.data.text[0]
    var weatherWeather = json.data.weather[0]
    var weatherTemp = json.data.temperature[0]

    $('.weather_date').text(dateCreate);
    $('.weather_time').text(weatherTime);
    $('.weather_temp').html(weatherTemp + '&deg;');
    $('.weather_text').text(weatherText);
    $('.weather_weather').text(weatherWeather);

    if(weatherWeather == "Isolated Showers") {
      $('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }
    else if(weatherWeather == "Mostly Cloudy") {
      $('#weather_icon').addClass('diw-clouds')
    }
    else if(weatherWeather == "Chance Rain") {
      $('#weather_icon').addClass('diw-cloud-hail-sun')
    }
    else if(weatherWeather == "Mostly Sunny") {
      $('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }
    else if(weatherWeather == "Mostly Clear") {
      $('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }
    else if(weatherWeather == "Sunny") {
      $('#weather_icon').addClass('diw-sun')
    }
    else if(weatherWeather == "Clear") {
      $('#weather_icon').addClass('diw-sun')
    }
    else if(weatherWeather == "Slight Chance Rain then Partly Sunny") {
      $('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }
    else {
      $('#weather_icon').addClass('diw-cloud-rain-2-sun')
    }


  })
}

$.getJSON(flowAPI, function (json) {

  var baseString = json.value.timeSeries[0]
  var createTime = baseString.values[0].value[0].dateTime
  var locationName = baseString.sourceInfo.siteName
  var flowNum = baseString.values[0].value[0].value
  var flowLat = baseString.sourceInfo.geoLocation.geogLocation.latitude
  var flowLong = baseString.sourceInfo.geoLocation.geogLocation.longitude
  weatherFn("http://forecast.weather.gov/MapClick.php?lat=" + flowLat + "&lon=" + flowLong + "&FcstType=json");
  var map = L.mapbox.map('map-one', 'mapbox.outdoors').setView([flowLat,flowLong], 14);

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

    $('.test').html(getWords(str));
    $('.createTime').text(createTime);
    $('.sitename').text(locationName);
    $('.flowNum').html
    (flowNum + '&nbsp;cfs');


    if(flowNum >= 4700) {
      $('#gauge').addClass('success');
    }
})




$(document).ready(function(){

  L.mapbox.accessToken = 'pk.eyJ1IjoiamFzb25oYWxzZXkiLCJhIjoiY2lrZm5oOWh3MDAxeHUza2w5MnM2aHdzYSJ9.WXf_OK1N34LKLlkBHCt_9w';

});



</script>