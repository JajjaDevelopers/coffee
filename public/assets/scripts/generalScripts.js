// Number formater
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
