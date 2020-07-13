var detectionArr = new Array();
var sensors = {};
var sensor = {};
var connectionTimer = null;
var connectionWaitingFlag = false;
var connectionWaitingDeviceAddr = '';
var connectionWaitingFlagTimer = "";
var flagForDisconntion = true;


function getDeviceCurrentStatus(addr) {

    if (sensors[addr] != undefined && sensors[addr] != null) {
        if (sensors[addr].isConnected)
            return 'Connected';
    }

    return 'Connecting';
}

function OnDevicesDataLoad() {
    /*var evt = $.Event('devicesdataloaded');

     $(window).trigger(evt);*/
    if (connectionTimer == null)
        connectionTimer = setInterval(function() {
            triggerSensorConnection();
        }, 1000);
}

function triggerSensorConnection() {

    //alert(JSON.stringify(sensors));

    if (!connectionWaitingFlag) {
        // alert("a");
        var lSResponse = localStorage.getItem("devicesData_" + localStorage.getItem("uid"));
        var data = JSON.parse(lSResponse);

        if (data.status == "success") {
            for (x in sensors) {
                //alert(JSON.stringify(sensors));
                //alert("data:: "+JSON.stringify(data));
                flag = false;
                for (var i = 0; i < data.data.length; i++) {
                    if (data.data[i].device_id == x)
                        flag = true;
                }

                //alert("Flag:: "+flag+" isConnected:: "+sensors[x].isConnected);
                if (sensors[x].isConnected == false && flag == true) {
                    //alert(sensors[x].isConnected);
                    deviceT = sensors[x];

                    ble.connect(deviceT.id, function() {
                        console.log("connect success")
                        document.getElementById('device_status_' + deviceT.id).innerHTML = '<span>Connected</span>';
                        sensors[x].isConnected = true;
                        flagForDisconntion = true;
                    }, function() {
                        console.log("connect error")
                    });
                    connectionWaitingFlag = true;
                    clearTimeout(connectionWaitingFlagTimer);
                    connectionWaitingFlagTimer = setTimeout(function() {
                        connectionWaitingFlag = false;
                    }, 5000);
                    connectionWaitingDeviceAddr = deviceT.id;
                    break;
                }
            }

        }
    }

}

function sRing(element) {

}

function rssi(adr) {
    evothings.ble.getRSSI(adr, function() {}, function() {});
}
(function() {
    // Dictionary of sensor.

    var detectionIntervals = {};
    var disconnectionCounter = {};
    // Timer that displays list of sensors.
    var timer = null;
    var count = 1;
    var disconnected = 0;
    var sum = 0;
    var lastClickTime = 0;
    var sosFlag = false;
    var beepFlag = false;
    var deviceTime = 0;

    function onDeviceReady() {
        //alert("ready");
        //console.log(evothings.ble.startScan);

        /*setInterval(function(){

            ble.startScan([], function(device) {
                //devices
                if(device.name == 'nRF5x'){
                    device.name = "Wallet";
                    device.isConnected = false;
                    device.timeStamp = Date.now();
                    sensors[device.id] = device;
                    //detectionArr.push(device.id);
                    console.log("@@Sensors Array@@Scan::" + JSON.stringify(device));
                }
            }, function(error){
                console.log(JSON.stringify(error));  
            });

        }, 300);*/

        ble.startScanWithOptions([], { reportDuplicates: true },
        function(device) {
            device.name = "Wallet";
            device.isConnected = false;
            device.timeStamp = Date.now();
            sensors[device.id] = device;
            //detectionArr.push(device.id);
            console.log("@@Sensors Array@@Scan::" + JSON.stringify(device));
            
        },
        function(error){
            console.log(JSON.stringify(error));  
        });

        ble.isEnabled(
            function() {
                console.log("Bluetooth is enabled");
            },
            function() {
                console.log("Bluetooth is *not* enabled");
            }
        );

        ble.startStateNotifications(
            function(state) {
                if(state == 'off'){
                    ble.enable(
                        function() {
                            console.log("Bluetooth is enabled");
                        },
                        function() {
                            console.log("The user did *not* enable Bluetooth");
                        }
                    );
                }
                console.log("Bluetooth is " + state);
            }
        );

        //Beacons showing on the add device page.
        setInterval(displaySensors, 2000);
        setInterval(uploadDetectionLog, 5000);
        setInterval(disconnectedDevice, 10000);
    }

    function disconnectedDevice(){

        for (x in sensors) {
            if (localStorage.getItem('device_address') == sensors[x].id) {
                var today = new Date();
                var Christmas = new Date(sensors[x].timeStamp);
                var diffMs = (today - Christmas); // milliseconds between now & Christmas
                var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
                if(parseInt(diffMins) >= 1){

                    setTimeout(function() {

                        if (flagForDisconntion) {
                             
                            if (localStorage.getItem('phone_notification') == null) {

                                cordova.plugins.notification.local.schedule({
                                   id: 1,
                                   title: 'Wallet Disconnected',
                                   message: "You left your wallet behind!",
                                   at: new Date()
                                })

                                // Play the audio file at url
                                var play_media = new Media('http://ringo.airbuzztechnologies.com/emergency_alert.mp3',
                                    // success callback
                                    function () { console.log("playAudio():Audio Success"); },
                                    // error callback
                                    function (err) { console.log("playAudio():Audio Error: " + err); }
                                );
                                // Play audio
                                play_media.play();

                            }

                            sensors[localStorage.getItem('device_address')].isConnected = false;
                            //add status in HTML
                            document.getElementById("device_status_" + localStorage.getItem('device_address')).innerHTML = "<span>Disconnected</span>";

                        }

                        flagForDisconntion = false;

                    }, 8000);

                }
            }
        }

    }

    function uploadDetectionLog() {
        //localStorage.setItem('sensors_' + localStorage.getItem('uid'), JSON.stringify(sensors))
        console.log('uploadDetectionLog: ' + JSON.stringify(sensors))
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://ringo.airbuzztechnologies.com/controller.php?action=insertDetectionLog",
            "method": "POST",
            "headers": {
                "content-type": "application/x-www-form-urlencoded",
                "cache-control": "no-cache",
                "postman-token": "b46667e1-3f23-8232-ede8-0d3e395d7014"
            },
            "data": {
                'detection_array': JSON.stringify(sensors),
                'user_id': localStorage.getItem("uid"),
                'deviceTime': localStorage.getItem('current_dateTime'),
                'latitude': localStorage.getItem('latitude'),
                'longitude': localStorage.getItem('longitude')
            }
        }
        jQuery.ajax(settings).done(function(response) {
            console.log(response);
        });
    }

    /* end of local notification*/
    function mapSensorRSSI(rssi) {
        if (rssi >= 0) return 1; // Unknown RSSI maps to 1.
        if (rssi < -100) return 100; // Max RSSI
        return 100 + rssi;
    }

    function getSortedSensorList(sensors) {
        var sensorList = [];
        for (var key in sensors) {
            sensorList.push(sensors[key]);
        }
        sensorList.sort(function(sensor1, sensor2) {
            return mapSensorRSSI(sensor1.rssi) < mapSensorRSSI(sensor2.rssi);
        });
        return sensorList;
    }

    function displaySensors() {

        var html = "";
        var sortedList = getSortedSensorList(sensors);

        for (var i = 0; i < sortedList.length; ++i) {
            var sensor = sortedList[i];
            var itemName = sensor.id;

            var itemFound = false;
            $('.list.beacons ul li').each(function() {
                if ($(this).attr("data-id") === itemName) {
                    itemFound = true;
                }
            });

            if (itemFound == true) {
                jQuery('.list.beacons ul li[data-id="' + sensor.id + '"]').find("span").html(sensor.distanceInMeters);
            } else {
                if (sensor.id) {
                    jQuery('.list.beacons ul').append('<li data-id="' + sensor.id + '"><label class="item-radio item-content"><input type="radio" name="demo-radio" value="' + sensor.id + '"/><i class="icon icon-radio"></i><div class="item-inner"><div class="item-title" style="width: 100%; float: left;">' + sensor.name + ' <i class="material-icons" style="font-size: 27px; float: right; width: 25px;"> touch_app </i><p style="font-size: 10px; margin: 0px;">Mac Address: ' + sensor.id + '</p></div></div></label></li>');
                    // add item here
                }
            }
        }

    }

    setTimeout(function(){
        // This calls onDeviceReady when Cordova has loaded everything.
        document.addEventListener('deviceready', onDeviceReady, false);
    },5000)

})(); // End of closure.