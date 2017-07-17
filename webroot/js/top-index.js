$(function() {
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