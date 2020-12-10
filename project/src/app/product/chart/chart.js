function setMinimumSizeSlices(data) {
    const minimumThreshold = 20;
    let sum = 0;
    data.forEach((item) => {
        item.value = item.amount;
        sum += item.value;
        if (item.amount < minimumThreshold) {
            item.value = minimumThreshold;
        }
    });
    data.forEach((item) => {
        item.realPercent = Math.round((item.amount / sum) * 100 * 100) / 100;
    });
}

function mockupChart(data) {
    let chartOptions = {
        'type': "pie",
        'theme': "light",
        'outlineColor': "",
        'dataProvider': [
            {
                'value': 10,
                'name': "no_data",
            },
        ],
        'valueField': "value",
        'titleField': "voted",
        'labelsEnabled': false,
        'color': "#a4a4a4",
        'balloonFunction': (dItem) => {
            return `<div><span>Bình chọn: </span>${dItem.title}</div>
                    <div><span>Số lượng: </span>${dItem.dataContext.amount}</div>
                    <div><span>Tỉ lệ: </span>${dItem.dataContext.realPercent}%</div>`;
        },
        'balloon': {
            'enabled': false,
            'borderThickness': 0,
            'color': "white",
            'textAlign': "left",
            'fontSize': 12,
            'pointerWidth': 0,
            'fillColor': "#19344a",
            'cornerRadius': 3,
            'fillAlpha': 1,
            'horizontalPadding': 10,
            'verticalPadding': 6,
        },
        'pullOutDuration': 0,
        'pullOutRadius': 0,
        'startDuration': 0,
        'colors': ["#009cdc", "#fcb108"],
        'radius': "35%",
        'fontFamily': "SFUIText,Helvetica,Arial,sans-serif",
        'fontSize': 14,
    };
    if (data && data.length > 0) {
        setMinimumSizeSlices(data);
        chartOptions.dataProvider = data;
        chartOptions.balloon.enabled = true;
    }
    return chartOptions;
};
var data = [{
    'voted': 'Like',
    'amount': 501
  }, {
    'voted': 'Dislike',
    'amount': 309
  }];
var chart = AmCharts.makeChart("chartdiv", mockupChart(data));
var a = 10;
setInterval(() => {
    var data = [{
        'voted': 'Like',
        'amount': a++
      }, {
        'voted': 'Dislike',
        'amount': 309
      }];
    var chart = AmCharts.makeChart("chartdiv", mockupChart(data));
},5000);