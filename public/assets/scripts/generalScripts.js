// Currency formater
function currecnyFormat(numVal) {
  // Place values
  var number = Number(numVal);
  if (number < 1000000000) {
    shortNumber = number / 1000000;
    n = Number(shortNumber.toFixed(1)).toLocaleString() + "M";
  } else if (number < 1000000000000) {
    shortNumber = number / 1000000000;
    n = Number(shortNumber.toFixed(2)).toLocaleString() + "B";
  } else {
    shortNumber = number / 1000000000000;
    n = Number(shortNumber.toFixed(2)).toLocaleString() + "T";
  }
  return n;
}

// Number formatter
function numberFormat(number) {
  var n = Number(number);
  return Number(n.toFixed(2)).toLocaleString();
}

// Table Trend Analysis
// Show trend relative to previous period value in the table
function tableTrend(value0, value1) {
  var v1 = Number(value1);
  var v0 = Number(value0);
  if (v1 < v0) {
    var trend = `<strong><span class="material-symbols-outlined" style="color: red; font-size:25px">
              trending_down
            </span>
            <span style="color: red"></strong></span>`;
  } else {
    var trend = `<strong><span class="material-symbols-outlined" style="color: green; font-size:25px">
              trending_up
            </span>
            <span style="color: green"></strong></span>`;
  }
  return trend;
  // $(`${divId}`).html(trend);
}
