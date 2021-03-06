<?php

use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts([
    'highcharts-more',
    'modules/solid-gauge'
]);
?>
<div id="cockpit1"></div>
<div id="cockpit2"></div>
<div id="cockpit3"></div>

<?php
$js = <<<JS
      
        
        
var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

    title: null,

    pane: {
        center: ['50%', '85%'],
        size: '140%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
            [0.6000, 'Crimson'], 
            [0.7999, 'Yellow'],
            [1.0, 'SpringGreen '],
        ],
        lineWidth: 0,
        minorTickInterval: null,
        tickAmount: 1,
        title: {
            y: -70
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};
        
        
function gen_cockpit(div,title_text,val){
  Highcharts.chart(div, Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: 'ร้อยละ'
        }
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'Speed',
        data: [val],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                   '<span style="font-size:16px;color:blue">'+title_text+'</span></div>'
        },
        tooltip: {
            valueSuffix: 'ร้อยละ'
        }
    }]

}));   
}





gen_cockpit('cockpit3','อ.นครไทย',60);
  

        
JS;

$this->registerJs($js);

