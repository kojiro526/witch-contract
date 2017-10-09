$(function() {
    var mydata1 = {
        labels: ["見込み値"],
        datasets: [
          {
            label: '契約済み',
            backgroundColor: "rgba(132,255,132,0.8)",
            data: [1250]
          },
          {
            label: '未契約：A',
            backgroundColor: "rgba(83,185,224,0.8)",
            data: [0]
          },
          {
            label: '未契約：B',
            backgroundColor: "rgba(244,233,83,0.8)",
            data: [300]
          }
        ],
        lineAtIndex:10
      };

    var options1 = {
        scales: {
            xAxes: [{
                stacked: true,
                ticks: {
                max: 5500,
                min: 0
                }
            }],
            yAxes: [{
                stacked: true
            }]
        }
    };

    var canvas = document.getElementById('chart-quota');
    var originalHorizontalBarDraw = Chart.controllers.horizontalBar.prototype.draw;
    Chart.helpers.extend(Chart.controllers.horizontalBar.prototype, {
      draw: function() {
        originalHorizontalBarDraw.apply(this, arguments);

        var chart = this.chart;
        var ctx = chart.chart.ctx;

        var index = chart.config.data.lineAtIndex;
        if (index) {
          var xaxis = chart.scales['x-axis-0'];
          var yaxis = chart.scales['y-axis-0'];

          ctx.save();
          ctx.beginPath();
          ctx.moveTo(xaxis.getPixelForValue(5000, index), yaxis.top);
          ctx.strokeStyle = '#ff0000';
          ctx.lineTo(xaxis.getPixelForValue(5000, index), yaxis.bottom);
          ctx.stroke();
          ctx.restore();
        }
      }
    });
    var chart = new Chart(canvas, {
        type : 'horizontalBar', // グラフの種類
        data : mydata1, // 表示するデータ
        options : options1
        // オプション設定
    });

    var mydata = {
    		  labels: ["巴マミ", "暁美ほむら", "佐倉杏子", "美樹さやか", "鹿目まどか"],
    		  datasets: [
    		    {
    		      label: '希望値',
    		      backgroundColor: "rgba(27,100,160,0.3)",
    		      data: [100, 900, 20, 200, 50],
    		    },
    		    {
    		      label: '見込み値',
    		      backgroundColor: "rgba(204,32,95,0.3)",
    		      data: [200, 1000, 50, 300, 10000],
    		    }
    		  ]
    		};

  //「オプション設定」
    var options = {
      title: {    
        display: true
      },
      scales: {
          yAxes: [{
                ticks: {
                max: 10000,
                min: 0
                }
          }]
      }
    };

    var canvas = document.getElementById('chart-by-persons');
    var chart = new Chart(canvas, {
        type : 'bar', // グラフの種類
        data : mydata, // 表示するデータ
        options : options
        // オプション設定
    });

    var mydata = {
    		  labels: ["巴マミ", "暁美ほむら", "佐倉杏子"],
    		  datasets: [
    		    {
    		      label: '穢れ値',
    		      backgroundColor: "rgba(217,83,224,0.3)",
    		      data: [50, 20, 10],
    		    }
    		  ]
    		};

  //「オプション設定」
    var options = {
      title: {    
        display: true
      },
      scales: {
          yAxes: [{
                ticks: {
                max: 100,
                min: 0
                }
          }]
      }
    };

    var canvas = document.getElementById('uncleanness-by-persons');
    var chart = new Chart(canvas, {
        type : 'bar', // グラフの種類
        data : mydata, // 表示するデータ
        options : options
        // オプション設定
    });

});