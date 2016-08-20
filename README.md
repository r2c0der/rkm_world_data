# rkm_world_data

<img src="http://world-data.r2wiki.com/assets/graphics/wd_headerImage_v2.png" height="150" />

<h2>World Data Experiment</h2>

<h3>Summary</h3>
World Data webapp/module is an informational and practice application. Once completed it will integrate several custom and publically available APIs and web services. The end goal is to port the web application to a mobile app on the Google store. 

<h4>How does it work? </h4>
The visitor selects a country from a dropdown menu to learn some interesting but high level facts of a select number of countries. Selecting a country will make calls to parse through .ini (create navigation and set configurations), .json (format of web service and API calls)  and .xml (custom - parsed for sitemap) and other external resources to render several panels of information. 

<h3>RESTful Services</h3>
<ul>
<li>getCountryData - custom </li>
<li>currencylayer - pubic API - exchange rate & currency converter | https://currencylayer.com/</li>
<li>NOAA - public API - weather and climate data http://www.ncdc.noaa.gov/cdo-web/webservices/v2</li>
</ul>
<h3>Technologies</h3>
<ul>
<li>Twitter Bootstrap Framework</li>
<li>JQuery &amp; JQuery UI</li>
<li>LESS </li>
<li>SMACCS Compliant </li>
<li>Angular2 </li>
</ul>
<code>//TODO </code>
Create charts using D3js

<h3>Features</h3>
Alphabetical Navigation - leverages JQuery libraries & custom JQuery UI styles to override default bootstrap css.

<h3>On the back-end</h3>
<code> $_POST['country_code'] </code> captured in a session cookie and passes variable to function <code>processdata($file)</code> . This file mimics the role of controller in a MVC framework.

<h3>Three webservices are invoked based on the country_code:</h3>
<h4>WS_country</h4>
Custom API | Returns the specific country information stored in a json file.

<h4>WS_currency</h4>
Public API | Returns currency conversion based on visitor's country selection

<h4>WS_weather </h4>
Public API | Returns the weather data based on visitor's country  selection.
