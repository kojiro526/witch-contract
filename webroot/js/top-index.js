$(function() {
    var mydata1 = {
        labels: ["今期"],
        datasets: [
          {
            label: '巴マミ',
            backgroundColor: "rgba(255,99,132,0.3)",
            data: [10]
          },
          {
            label: '暁美ほむら',
            backgroundColor: "rgba(132,255,132,0.3)",
            data: [20]
          }
        ],
        lineAtIndex:10 
      };

    var options1 = {
        scales: {
            xAxes: [{
                //stacked: true,
                ticks: {
                max: 1000,
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
          ctx.moveTo(xaxis.getPixelForValue(900, index), yaxis.top);
          ctx.strokeStyle = '#ff0000';
          ctx.lineTo(xaxis.getPixelForValue(900, index), yaxis.bottom);
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
    		      hoverBackgroundColor: "rgba(255,99,132,0.3)",
    		      data: [100, 900, 20, 200, 50],
    		    }
    		  ]
    		};

  //「オプション設定」
    var options = {
      title: {    
        display: true
      }
    };

    var canvas = document.getElementById('chart-by-persons');
    var chart = new Chart(canvas, {
        type : 'bar', // グラフの種類
        data : mydata, // 表示するデータ
        options : options
        // オプション設定
    });

});