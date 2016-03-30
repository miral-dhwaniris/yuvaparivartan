   
<?php 

//
//  $districts = app\models\District::find()->all();
//  
//  for($i=0;$i<count($districts);$i++)
//  {
//      $AllCenterssSMART = \app\models\Centers::find()->where(['district_id'=>$districts[$i]['district_id'],'smart_center_type'=>'SMART'])->all();
//      $AllCenterssSmartPlus = \app\models\Centers::find()->where(['district_id'=>$districts[$i]['district_id'],'smart_center_type'=>'SMART +'])->all();
//      $AllCenterssSmartT = \app\models\Centers::find()->where(['district_id'=>$districts[$i]['district_id'],'smart_center_type'=>'SMART-T'])->all();
//      
//      display_array("---Smart");
//      display_array($AllCenterssSMART);
//      display_array("---SmartPlus");
//      display_array($AllCenterssSmartPlus);
//      display_array("---SmartT");
//      display_array($AllCenterssSmartT);
//      
//      
//  }
//  
//  exit;

?>




<style>
#map {
  width: 100%;
  height: 700px;
}
</style>

<script src="https://maps.googleapis.com/maps/api/js"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/data.js"></script>
<script src="http://code.highcharts.com/modules/drilldown.js"></script>

<script>

function initialize() {
//     alert('df');
     
  var mapCanvas = document.getElementById('map');
  var mapOptions = {
    center: new google.maps.LatLng(21.0000, 78.0000),
    zoom: 5,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
  
  var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|2A3F54",
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
  
  //-------------------For Districts
   
   
   
  <?php
  
  $districts = app\models\District::find()->all();
  
  for($i=0;$i<count($districts);$i++)
  {
  
  ?>
          
          
    <?php 
    
    $AllCenterss = \app\models\Centers::find()->where(['district_id'=>$districts[$i]['district_id']])->all();
    $AllCenterssSMART = \app\models\Centers::find()->where(['district_id'=>$districts[$i]['district_id'],'smart_center_type'=>'SMART'])->all();
    $AllCenterssSmartPlus = \app\models\Centers::find()->where(['district_id'=>$districts[$i]['district_id'],'smart_center_type'=>'SMART +'])->all();
    $AllCenterssSmartT = \app\models\Centers::find()->where(['district_id'=>$districts[$i]['district_id'],'smart_center_type'=>'SMART-T'])->all();
      
//    display_array("---Smart");
//    display_array($AllCenterssSMART);
//    display_array("---SmartPlus");
//    display_array($AllCenterssSmartPlus);
//    display_array("---SmartT");
//    display_array($AllCenterssSmartT);
    
    ?>
        
    var contentStringdi<?php echo $i; ?> = '<style>'+
        '    .tableMM'+
        '    {'+
//        '        width: 300px; '+
//        '        height: 100px;'+
//        '        background: #000000;'+
        '    }'+
        '    .tableMM tr'+
        '    {'+
        '    }'+
        '    .tableMM td'+
        '    {'+
        '        padding: 10px;'+
        '        border: 1px #000000 solid;'+
        '    }'+
        '</style>'+
        '<div class="tableMM" id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading"><?php echo $districts[$i]['district_name'] ?></h1>'+
        '<div id="bodyContent">'+
        '<p>\n\ '+
            '<table style="width: 100%">'+
            '    <tr>'+
            '        <td><h4>'+
            '            Total Centers '+
            '        </h4></td>'+
            '        <td><h4>'+
            '            <?php echo count($AllCenterss); ?>'+
            '        </h4></td>'+
            '    </tr>'+
            '    <tr>'+
            '        <td><h4>'+
            '            SMART Centers '+
            '        </h4></td>'+
            '        <td><h4>'+
            '            <?php echo count($AllCenterssSMART); ?>'+
            '        </h4></td>'+
            '    </tr>'+
            '    <tr>'+
            '        <td><h4>'+
            '            SMART + Centers '+
            '        </h4></td>'+
            '        <td><h4>'+
            '             <?php echo count($AllCenterssSmartPlus); ?>'+
            '        </h4></td>'+
            '    </tr>'+
            '    <tr>'+
            '        <td><h4>'+
            '             SMART-T '+
            '        </h4></td>'+
            '        <td><h4>'+
            '            <?php echo count($AllCenterssSmartT); ?>'+
            '        </h4></td>'+
            '    </tr>'+
            '</table>'+
        '</div>'+
        '</div>';

    var infowindowdi<?php echo $i; ?> = new google.maps.InfoWindow({
      content: contentStringdi<?php echo $i; ?>
    });
    
    //12.9258361, lng: 77.60241
    var myLatLng = {lat: <?php echo $districts[$i]['geo_coordinate_lat']; ?>, lng: <?php echo $districts[$i]['geo_coordinate_lng']; ?>};
    var markerdi<?php echo $i; ?> = new google.maps.Marker({
        icon: pinImage,
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });
    markerdi<?php echo $i; ?>.addListener('click', function() {
        infowindowdi<?php echo $i; ?>.open(map, markerdi<?php echo $i; ?>);
    });
    
    
  
  <?php
  
      
  }
  
  ?>
          
          
    //---------------------------------------------------------

  
  
  
  <?php
  
  $centers = app\models\Centers::find()->all();
  
  for($i=0;$i<count($centers);$i++)
  {
  
  ?>
          
          
    var contentString<?php echo $i; ?> = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading"><?php echo $centers[$i]['center_name'] ?></h1>'+
        '<div id="bodyContent">'+
        '<p>\n\
        <b>State :</b><?php
        $mmoodd = \app\models\States::find()->where(['id'=>$centers[$i]['state_id']])->one();
        
        
        if($mmoodd != null)
        {
            echo $mmoodd->state_name; 
        }    
        ?></p>\n\
        <b>District :</b><?php
        $mmoodd = \app\models\District::find()->where(['district_id'=>$centers[$i]['district_id']])->one();
        
        
        
        if($mmoodd != null)
        {
            echo $mmoodd->district_name ; 
        }    
        ?></p>\n\
        <b>Smart Center Type :</b><?php 
        if($centers[$i]['smart_center_type'] != '')
        {
            echo $centers[$i]['smart_center_type']; 
        }
        ?></p>\n\
        '+
        '<a href=<?php echo "index.php?r=center/view&id=".$centers[$i]['center_id'] ?>>GO>></a>'+
        '</div>'+
        '</div>';

    var infowindow<?php echo $i; ?> = new google.maps.InfoWindow({
      content: contentString<?php echo $i; ?>
    });
    
    
    var myLatLng = {lat: <?php echo $centers[$i]['geo_coordinate_lat']; ?>, lng: <?php echo $centers[$i]['geo_coordinate_lng']; ?>};
    var marker<?php echo $i; ?> = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });
    marker<?php echo $i; ?>.addListener('click', function() {
        infowindow<?php echo $i; ?>.open(map, marker<?php echo $i; ?>);
    });
    
    
  
  <?php
  
      
  }
  
  ?>
  
  
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>


<?php

//display_array(app\models\Centre::find()->all());
//exit;

?>






<!--HiCharts-->



<script>
    $(function () {
    // Create the chart
    $('#container').highcharts({
        credits: {enabled: false},
        chart: {
            type: 'column'
        },
        title: {
            text: 'Centers with Smart Type'
        },
        subtitle: {
//            text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Count of centers'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
//                    format: '{point.y:.1f}%'+'  {point.name}'
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: "Districts",
            colorByPoint: true,
            data: [
                <?php 
                for($mi=0; $mi<count($districts); $mi++)
                {?>
                    {
                        name: "<?php echo $districts[$mi]['district_name'] ?>",
                        y: <?php 
                            $AllCenterssSMART = \app\models\Centers::find()->where(['district_id'=>$districts[$mi]['district_id'],'smart_center_type'=>'SMART'])->all();
                            echo count($AllCenterssSMART);
                            ?>,
                        drilldown: "<?php echo $districts[$mi]['district_name'] ?>"
                    },
                <?php
                }?>
                ]
        }],
        drilldown: {
            series: [
            
                <?php 
                for($mi=0; $mi<count($districts); $mi++)
                {
                ?>
                    {
                        name: "<?php echo $districts[$mi]['district_name']; ?>",
                        id: "<?php echo $districts[$mi]['district_name']; ?>",
                        <?php
                        $AllCenterssSMART = \app\models\Centers::find()->where(['district_id'=>$districts[$mi]['district_id'],'smart_center_type'=>'SMART'])->all();
                        ?>
                        data: [
                            <?php 
                            for($ni=0; $ni<count($AllCenterssSMART); $ni++)
                            {
                            ?>
                            [
                                "<?php echo $AllCenterssSMART[$ni]->center_name ?>",
                                20
                            ],
                            <?php 
                            }
                            ?>
                            
                        ]
                    },
                <?php
                }
                ?>
            ]
        }
    });
});
</script>

<div id="container">
    
</div>



<h1>All Centres</h1>
<div id="map"></div>