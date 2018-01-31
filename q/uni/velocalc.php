<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1">
    <meta name="keywords" content="Ritzelrechner, Entfaltungsrechner,gear calculator,bicycle">
    <meta name="description" content="Graphical gear calculator for bicycle gearing systems. Includes derailleur gears and internal gear hubs.
    Grafischer Ritzelrechner zur Berechnung der Entfaltung von Fahrradschaltungen.">
    <title>HTML5 Gear Calculator</title>
  	<link type="text/css" rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="l10n.js"></script>
    <script type="text/javascript" src="localization.js"></script>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript" src="graphics.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>

<body style="height: 878px; cursor: auto;">
	<div id="outerFrame" class="frame">
<!--div id="ribbon-banner"><span id="ribbon1">New Version</span><br><span  id="ribbon2">HTML5 - runs on tablets</span><div id="close_ribbon">x</div></div-->
 	<div id="canvasArea" class="outerArea">
     	<figure>
        	<canvas id="myCanvas" height="240" width="1004">Your browser does not support HTML5. Please use a current browser like Chrome, Firefox or IE (version 9 or higher)</canvas>
    	</figure>
     	<figure>
        	<canvas id="myCanvas2" height="240px"></canvas>
    	</figure>
 	</div>
 	
 	<div id="controlArea" class="outerArea">
 		<div id="cwselection" class="ringselection">
    		<div class="Chainring ui-draggable ui-draggable-handle" id="cw1" title="%tt_moveCw" style="left: 498px;"><div class="nTeeth">42</div></div>
    		<div class="Chainring ui-draggable ui-draggable-handle" id="cw2" title="%tt_moveCw" style="top: 0px; left: 0px;"><div class="nTeeth"></div></div>
    		<div class="Chainring ui-draggable ui-draggable-handle" id="cw3" title="%tt_moveCw" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div id="cwScale" class="scale"> <div class="scaleTick" style="left:-2px"></div><div class="scaleTick" style="left:18px"></div><div class="scaleTick" style="left:39px"></div><div class="scaleTick" style="left:59px"></div><div class="scaleTick" style="left:79px"></div><div class="scaleTick" style="left:100px"></div><div class="scaleTick" style="left:120px"></div><div class="scaleTick" style="left:140px"></div><div class="scaleTick" style="left:161px"></div><div class="scaleTick" style="left:181px"></div><div class="scaleTick" style="left:201px"></div><div class="scaleTick" style="left:222px"></div><div class="scaleTick" style="left:242px"></div><div class="scaleTick" style="left:262px"></div><div class="scaleTick" style="left:283px"></div><div class="scaleTick" style="left:303px"></div><div class="scaleTick" style="left:323px"></div><div class="scaleTick" style="left:344px"></div><div class="scaleTick" style="left:364px"></div><div class="scaleTick" style="left:384px"></div><div class="scaleTick" style="left:405px"></div><div class="scaleTick" style="left:425px"></div><div class="scaleTick" style="left:446px"></div><div class="scaleTick" style="left:466px"></div><div class="scaleTick" style="left:486px"></div><div class="scaleTick" style="left:507px"></div><div class="scaleTick" style="left:527px"></div><div class="scaleTick" style="left:547px"></div><div class="scaleTick" style="left:568px"></div><div class="scaleTick" style="left:588px"></div><div class="scaleTick" style="left:608px"></div><div class="scaleTick" style="left:629px"></div><div class="scaleTick" style="left:649px"></div><div class="scaleTick" style="left:669px"></div><div class="scaleTick" style="left:690px"></div><div class="scaleTick" style="left:710px"></div><div class="scaleTick" style="left:730px"></div><div class="scaleTick" style="left:751px"></div><div class="scaleTick" style="left:771px"></div><div class="scaleTick" style="left:791px"></div><div class="scaleTick" style="left:812px"></div><div class="scaleTick" style="left:832px"></div><div class="scaleTick" style="left:852px"></div><div class="scaleTick" style="left:873px"></div><div class="scaleTick" style="left:893px"></div></div>
        </div>
 		<div id="spselection" class="ringselection">
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp01" title="%tt_moveSp" style="top: 0px; left: 267px;"><div class="nTeeth">17</div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp02" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp03" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp04" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp05" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp06" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp07" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp08" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp09" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp10" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div class="sprocket ui-draggable ui-draggable-handle" id="sp11" title="%tt_moveSp" style="left: 0px;"><div class="nTeeth"></div></div>
    		<div id="spScale" class="scale"> <div class="scaleTick" id="test" style="left:-2px"></div><div class="scaleTick" id="test" style="left:25px"></div><div class="scaleTick" id="test" style="left:52px"></div><div class="scaleTick" id="test" style="left:79px"></div><div class="scaleTick" id="test" style="left:106px"></div><div class="scaleTick" id="test" style="left:134px"></div><div class="scaleTick" id="test" style="left:161px"></div><div class="scaleTick" id="test" style="left:188px"></div><div class="scaleTick" id="test" style="left:215px"></div><div class="scaleTick" id="test" style="left:242px"></div><div class="scaleTick" id="test" style="left:269px"></div><div class="scaleTick" id="test" style="left:296px"></div><div class="scaleTick" id="test" style="left:323px"></div><div class="scaleTick" id="test" style="left:351px"></div><div class="scaleTick" id="test" style="left:378px"></div><div class="scaleTick" id="test" style="left:405px"></div><div class="scaleTick" id="test" style="left:432px"></div><div class="scaleTick" id="test" style="left:459px"></div><div class="scaleTick" id="test" style="left:486px"></div><div class="scaleTick" id="test" style="left:513px"></div><div class="scaleTick" id="test" style="left:540px"></div><div class="scaleTick" id="test" style="left:568px"></div><div class="scaleTick" id="test" style="left:595px"></div><div class="scaleTick" id="test" style="left:622px"></div><div class="scaleTick" id="test" style="left:649px"></div><div class="scaleTick" id="test" style="left:676px"></div><div class="scaleTick" id="test" style="left:703px"></div><div class="scaleTick" id="test" style="left:730px"></div><div class="scaleTick" id="test" style="left:757px"></div><div class="scaleTick" id="test" style="left:785px"></div><div class="scaleTick" id="test" style="left:812px"></div><div class="scaleTick" id="test" style="left:839px"></div><div class="scaleTick" id="test" style="left:866px"></div><div class="scaleTick" id="test" style="left:893px"></div></div>
        </div>
 	</div>
 
    <div id="calcControls" class="outerArea">
        <div id="column1" class="threeColumns">
			<div id="GearingTypeSelect" class="control">
				<!-- h4>DropDowns</h4-->
				<label id="l_gearing">%gearing</label>
				<select id="selectBoxGearingType" class="selector">
					<!-- will be filled by data from data.json -->
				<option value="DERS">%derailleurs</option><option value="SGLS">Singlespeed</option><option value="RLSH">Rohloff Speedhub</option><option value="SIM9">SRAM iMotion 9</option><option value="SRG8">SRAM G8</option><option value="SSS7">SRAM Spectro S7</option><option value="SSP5">SRAM Spectro P5</option><option value="SSC5">SRAM P5 Cargo</option><option value="SSI3">SRAM iM3 T3</option><option value="SSAU">SRAM Automatix</option><option value="SA11">Shimano Alfine 11</option><option value="SNI8">Shimano Alf/Inter 8</option><option value="SNI7">Shimano Inter 7</option><option value="SNI5">Shimano Inter 5</option><option value="SNI3">Shimano Inter 3</option><option value="FS3H">Sachs Torpedo 3111</option><option value="FS55">Sachs Torpedo 55</option><option value="FSDU">Sachs Duomatic</option><option value="SAX8">Sturmey Archer X8</option><option value="SAX5">Sturmey Archer X5</option><option value="SAS5">Sturmey Archer S5</option><option value="SAAW">Sturmey Archer AW</option></select>
			</div>
			<div id="ChainringSelect" class="control">
				<!-- h4>DropDowns</h4-->
				<label id="l_chainrings">%chainrings</label>
				<select id="selectBoxChainrings" class="selector">
					<!-- will be filled by data from data.json -->
				<option value="00,00,00">%custom</option><option value="00,39,53">39-53</option><option value="00,39,52">39-52</option><option value="00,42,52">42-52</option><option value="00,36,52">36-52</option><option value="00,34,50">34-50</option><option value="00,36,46">36-46</option><option value="30,42,52">30-42-52</option><option value="30,39,52">30-39-53</option><option value="30,40,50">30-40-50</option><option value="26,36,48">26-36-48</option><option value="22,30,40">22-33-44</option><option value="22,33,44">22-33-44</option><option value="22,32,44">22-32-44</option><option value="24,32,42">24-32-42</option><option value="22,30,40">22-30-40</option><option value="00,30,45">30-45</option><option value="00,30,44">30-44</option><option value="00,30,42">30-42</option><option value="00,29,42">29-42</option><option value="00,28,42">28-42</option><option value="00,28,40">28-40</option><option value="00,28,38">28-38</option><option value="00,26,39">26-39</option><option value="00,26,38">26-38</option><option value="00,26,36">26-36</option><option value="00,24,38">24-38</option><option value="00,29,36">29-36</option><option value="00,24,38">24-38</option><option value="00,24,36">24-36</option><option value="00,24,34">24-34</option><option value="00,24,34">22-36</option><option value="00,00,38">38</option><option value="00,00,36">36</option><option value="00,00,34">34</option><option value="00,00,32">32</option><option value="00,00,30">30</option><option value="00,00,28">28</option></select>
			</div>
			<div id="SprocketSelect" class="control">
				<label id="l_sprockets">%sprockets</label>
				<select id="selectBoxSprockets" class="selector">
					<!-- will be filled by data from data.json -->
				<option value="00,00,00,00,00,00,00,00,00,00,00">%custom</option><option value="11,12,13,14,15,16,17,18,19,21,23">11/11-23</option><option value="11,12,13,14,15,16,17,19,21,23,25">11/11-25</option><option value="11,12,13,14,15,17,19,21,23,25,28">11/11-28</option><option value="11,12,13,14,16,18,20,22,25,28,32">11/11-32</option><option value="11,12,13,15,17,19,22,25,28,32,36">11/11-36 SRAM</option><option value="12,13,14,15,16,17,18,19,21,23,25">11/12-25</option><option value="12,13,14,15,16,17,19,21,23,25,27">11/12-27</option><option value="12,13,14,15,16,17,19,21,23,25,28">11/12-28</option><option value="12,13,14,15,16,17,19,21,23,26,29">11/12-29</option><option value="11,13,15,17,19,21,24,27,31,35,40">11/11-40 XTR</option><option value="10,12,14,16,18,21,24,28,32,36,42">11/10-42 XX1</option><option value="00,11,12,13,14,15,16,17,18,19,21">10/11-21</option><option value="00,11,12,13,14,15,16,17,19,21,23">10/11-23</option><option value="00,11,12,13,14,15,17,19,21,23,25">10/11-25</option><option value="00,11,12,13,14,15,17,19,21,23,26">10/11-26</option><option value="00,11,12,13,14,15,17,19,21,24,28">10/11-28</option><option value="00,11,12,13,14,15,17,19,22,25,28">10/11-28n</option><option value="00,11,12,14,16,18,20,22,25,28,32">10/11-32 Shimano</option><option value="00,11,12,13,15,17,19,22,25,28,32">10/11-32 SRAM</option><option value="00,11,13,15,17,19,21,23,26,30,34">10/11-34</option><option value="00,11,13,15,17,19,21,24,28,32,36">10/11-36</option><option value="00,12,13,14,15,16,17,18,19,20,21">10/12-21</option><option value="00,12,13,14,15,16,17,18,19,21,23">10/12-23</option><option value="00,12,13,14,15,16,17,19,21,23,25">10/12-25</option><option value="00,12,13,14,15,16,17,19,21,24,27">10/12-27</option><option value="00,12,13,14,15,17,19,21,24,27,30">10/12-30</option><option value="00,12,13,15,17,19,22,25,28,32,36">10/12-36</option><option value="00,13,14,15,16,17,18,19,21,23,25">10/13-25</option><option value="00,13,14,15,16,17,18,19,21,23,26">10/13-26</option><option value="00,13,14,15,16,17,19,21,23,26,29">10/13-29</option><option value="00,14,15,16,17,18,19,20,21,22,23">10/14-23</option><option value="00,14,15,16,17,18,19,20,21,23,25">10/14-25</option><option value="00,00,11,12,13,14,15,16,17,18,19">9/11-19</option><option value="00,00,11,12,13,14,15,16,17,19,21">9/11-21</option><option value="00,00,11,12,13,14,15,17,19,21,23">9/11-23</option><option value="00,00,11,12,13,14,16,18,21,24,28">9/11-28</option><option value="00,00,11,12,14,16,18,21,24,28,32">9/11-32</option><option value="00,00,11,13,15,17,20,23,26,30,34">9/11-34</option><option value="00,00,12,13,14,15,16,17,18,19,21">9/12-21</option><option value="00,00,12,13,14,15,16,17,19,21,23">9/12-23</option><option value="00,00,12,13,14,15,17,19,21,23,25">9/12-25</option><option value="00,00,12,13,14,15,17,19,21,24,27">9/12-27</option><option value="00,00,12,14,16,18,20,23,26,30,34">9/12-34</option><option value="00,00,12,14,16,18,21,24,28,32,36">9/12-36</option><option value="00,00,13,14,15,16,17,18,19,21,23">9/13-23</option><option value="00,00,13,14,15,16,17,19,21,23,25">9/13-25</option><option value="00,00,13,14,15,16,17,19,21,23,26">9/13-26</option><option value="00,00,13,14,15,17,19,21,23,25,28">9/13-28</option><option value="00,00,14,15,16,17,18,19,21,23,25">9/14-25</option><option value="00,00,14,15,16,17,19,21,23,25,28">9/14-25</option><option value="00,00,00,00,13,15,17,19,22,25,30">7/13-30</option></select>
			</div>
		</div><div id="column2" class="threeColumns">
			<div id="ringDropDownArea2" class="control">
				<!-- h4>DropDowns2</h4-->
				<label id="l_wheel_size">%wheel_size</label>
			    <input type="text" id="inputCircumference" name="fname" class="textInput" title="%tt_wheel_size">
				<select id="selectWheelSize" class="selector" title="%tt_wheel_size">
				    <!-- will be filled by data from data.json -->
			    <option value="1265">16" 50-305</option><option value="1325">16" 35-349</option><option value="1330">16" 37-349</option><option value="1380">18" 40-355</option><option value="1440">18" 50-355</option><option value="1510">20" 35-406</option><option value="1540">20" 40-406</option><option value="1580">20" 47-406</option><option value="1600">20" 50-406</option><option value="1620">20" 54-406</option><option value="1650">20" 60-406</option><option value="1900">24" 47-507</option><option value="1910">24" 50-507</option><option value="1930">24" 54-507</option><option value="1955">24" 57-507</option><option value="1980">24" 60-507</option><option value="1995">24" 62-507</option><option value="1990">26" 35-559</option><option value="2030">26" 40-559</option><option value="2050">26" 47-559</option><option value="2075">26" 50-559</option><option value="2100">26" 54-559</option><option value="2120">26" 57-559</option><option value="2160">26" 60-559</option><option value="2101">26" 37-590</option><option value="2196">27,5" 54-584</option><option value="2215">27,5" 57-584</option><option value="2240">27,5" 60-584</option><option value="2102">28" 20-622</option><option value="2125">28" 23-622</option><option value="2135">28" 25-622</option><option value="2150">28" 28-622</option><option value="2161">28" 30-622</option><option value="2170">28" 32-622</option><option value="2185">28" 35-622</option><option value="2200">28" 37-622</option><option value="2220">28" 40-622</option><option value="2230">28" 42-622</option><option value="2250">28" 47-622</option><option value="2280">28" 50-622</option><option value="2295">28" 54-622</option><option value="2330">28" 60-622</option><option value="2221">28" 32-630</option><option value="2250">28" 40-635</option><option value="2281">29" 50-622</option><option value="2309">29" 54-622</option><option value="2328">29" 57-622</option><option value="2341">29" 60-622</option></select>
			</div>
			<div id="displaySelect" class="control">
				<!-- h4>DropDowns</h4-->
				<label id="l_display">%display</label>
				<select id="selectDisplay" class="selector">
                    <option id="o_teeth" value="teeth">%teeth</option>
                    <option id="o_development" value="development">%development</option>
                    <option id="o_ratio" value="ratio">%ratio</option>
                    <option id="o_speed" value="speed">%speed</option>
				</select>
			</div>
			<div id="radioButtonArea" class="control">
				<label id="l_units">%units</label>
                <div id="radio" class="radioButtons">
                    <input id="unitKmh" type="radio" name="units" value="kmh">
                    <label for="unitKmh">km/h</label>
                    <input id="unitMph" type="radio" name="units" value="mph">
                    <label for="unitMph">mph</label>
                </div>
            </div>
		</div><div id="column3" class="threeColumns">
			<div id="cadenceSliderArea" class="control">
				<!-- h4> Cadence </h4-->
				<label id="l_cadence">%cadence</label><label id="cadenceValue">90</label>
				<div id="cadenceSlider" class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"> <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 50%;"></span></div>
			</div>
			<div id="chainLineSliderArea" class="control">
				<!-- h4> Allowed Chain Angle </h4-->
				<label id="l_chain_angle">%chain_angle</label><label id="chainAngleValue">2.5°</label>
				<div id="chainLineSlider" class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" title="%tt_chain_angle"> <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 52.6315789473684%;"></span></div>
			</div>
			<div class="control">
                <button id="buttonCompare" type="Button" class="compButton" title="%tt_compare">%compare</button>
            </div>
		</div>
    <div id="urlArea" class="oneColumn">
			<div id="ringDropDownArea3" class="control">
			    <!-- h4>DropDowns2</h4-->
			    <label>URL</label>
			    <input type="text" id="inputURL" name="url" class="textInput" title="%tt_url">
			</div>
        
    </div>
    </div>
 	<div id="footer">
 		<span id="copy" class="footer_text">© Dirk Feeken</span> 	
 		<img src="images/HTML5_Logo_32.png" id="html5_logo">
        <span id="mail" class="footer_text" title="%tt_mail">%mail</span>
 	</div>
    </div>


</body></html>